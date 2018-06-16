<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use Validator;  // 驗證器
use Hash;       // 雜湊
use App\UserAuth as User;   // 使用者 Eloquent Model
use DB;
use Illuminate\Support\Facades\Session;
use Exception;

class UserAuthController extends Controller
{

    // 登入
    public function signInPage(){
        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        $binding = [
            'title' => '會員登入' , 'subject' => '會員登入',
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav
        ];

        return view('auth.signIn', $binding);
    }

    // 處理登入資料
    public function signInProcess(){
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // Email
            'email'=> [
                'required',
                'max:150',
                'email',
            ],
            // 密碼
            'password' => [
                'required',
                'min:6',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/auth/sign-in')
                ->withErrors($validator)
                ->withInput();
        }

        // 撈取使用者資料
        $User = User::where('email', $input['email'])->firstOrFail();

        // 檢查密碼是否正確
        $is_password_correct = Hash::check($input['password'], $User->password);

        if (!$is_password_correct) {
            // 密碼錯誤回傳錯誤訊息
            $error_message = [
                'msg' => [
                    '密碼驗證錯誤',
                ],
            ];
            return redirect('/user/auth/sign-in')
                ->withErrors($error_message)
                ->withInput();
        }

        // session 紀錄會員編號
        session()->put('user_id', $User->id);
        session()->put('user_nickname', $User->nickname);
        session()->put('user_type', $User->type);

        if(session('user_type') == 'A'){
            return redirect()->intended('/admin');

        }elseif (session('user_type') == 'G'){
            // 重新導向到原先使用者造訪頁面，沒有嘗試造訪頁則重新導向回首頁
            return redirect()->intended('/');
        }

    }


    // 註冊
    public function signUpPage(){
        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        $binding = [
            'title' => '會員註冊' , 'subject' => '會員註冊',
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav
        ];

        return view('auth.signUp', $binding);
    }

    // 處理註冊資料
    public function signUpProcess(){
        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // 暱稱
            'nickname'=> [
                'required',
                'max:50',
            ],
            // Email
            'email'=> [
                'required',
                'max:150',
                'email',
            ],
            // 密碼
            'password' => [
                'required',
                'same:password_confirmation',
                'min:6',
            ],
            // 密碼驗證
            'password_confirmation' => [
                'required',
                'min:6',
            ],
            // 帳號類型
            'type' => [
                'required',
                'in:G,A'
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return redirect('/user/auth/sign-up')
                ->withErrors($validator)
                ->withInput();
        }

        // 密碼加密
        $input['password'] = Hash::make($input['password']);

        // 新增會員資料
        $Users = User::create($input);

        // 寄送註冊通知信
        $mail_binding = [
            'nickname' => $input['nickname'],
            'email' => $input['email'],
        ];

        Mail::send('email.signUpEmailNotification', $mail_binding,
            function ($mail) use ($mail_binding){
                //收件人
                $mail->to($mail_binding['email']);
                //寄件人
                $mail->from('3a432016@gm.student.ncut.edu.tw');
                //郵件主旨
                $mail->subject('恭喜註冊 NCUT Learning 影片學習網 成功');
            });
        //SendSignUpMailJob::dispatch($mail_binding)
        //->onQueue('high');

        // 重新導向到登入頁
        return redirect('/user/auth/sign-in');
    }

    // 處理登出資料
    public function signOut(){
        // 清除 Session
        Session::flush();

        // 重新導向回首頁
        return redirect('/user/auth/sign-in');
    }

    // Facebook 登入
    public function facebookSignInProcess()
    {
        $redirect_url = env('FACEBOOK_REDIRECT');

        return Socialite::driver('facebook')
            ->scopes(['user_friends'])
            ->redirectUrl($redirect_url)
            ->redirect();
    }


    // Facebook 登入重新導向授權資料處理
    public function facebookSignInCallbackProcess()
    {
        if (request()->error == 'access_denied') {
            throw new Exception('授權失敗，存取錯誤');
        }
        // 依照網域產出重新導向連結 (來驗證是否為發出時同一 callback )
        $redirect_url = env('FACEBOOK_REDIRECT');
        // 取得第三方使用者資料
        $FacebookUser = Socialite::driver('facebook')
            ->fields([
                'name',
                'email',
                'gender',
                'verified',
                'link',
                'first_name',
                'last_name',
                'locale',
            ])
            ->redirectUrl($redirect_url)->user();

        $facebook_email = $FacebookUser->email;

        if (is_null($facebook_email)) {
            throw new Exception('未授權取得使用者 Email');
        }
        // 取得 Facebook 資料
        $facebook_id = $FacebookUser->id;
        $facebook_name = $FacebookUser->name;

        // 取得使用者資料是否有此 Facebook id 資料
        $User = User::where('facebook_id', $facebook_id)->first();

        if (is_null($User)) {
            // 沒有綁定 Facebook Id 的帳號，透過 Email 尋找是否有此帳號
            $User = User::where('email', $facebook_email)->first();
            if (!is_null($User)) {
                // 有此帳號，綁定 Facebook Id
                $User->facebook_id = $facebook_id;
                $User->save();
            }
        }

        if (is_null($User)){
            // 尚未註冊
            $input = [
                'email'       => $facebook_email,   // Email
                'nickname'    => $facebook_name,    // 暱稱
                'password'    => uniqid(),          // 隨機產生密碼
                'facebook_id' => $facebook_id,      // Facebook ID
                'type'        => 'G',               // 一般使用者
            ];
            // 密碼加密
            $input['password'] = Hash::make($input['password']);
            // 新增會員資料
            $User = User::create($input);

            // 寄送註冊通知信
            $mail_binding = [
                'nickname' => $input['nickname'],
                'email' => $input['email'],
            ];

            Mail::send('email.signUpEmailNotification', $mail_binding,
                function ($mail) use ($mail_binding){
                    //寄件人
                    $mail->to($mail_binding['email']);
                    //收件人
                    $mail->from('3a432016@gm.student.ncut.edu.tw');
                    //郵件主旨
                    $mail->subject('恭喜註冊 NCUT Learning 影片學習網 成功');
                });

            //SendSignUpMailJob::dispatch($mail_binding)
            //->onQueue('high');
        }

        // 登入會員
        // session 紀錄會員編號
        session()->put('user_id', $User->id);
        session()->put('user_nickname', $User->nickname);
        session()->put('user_type', $User->type);
        // 重新導向到原先使用者造訪頁面，沒有嘗試造訪頁則重新導向回首頁
        return redirect()->intended('/');
    }

    // 檢視會員 collect 的影片
    public function user_sort_videosPage($sort,$user_id){
        if($sort == 'collect' ){
            $Get_Official =  DB::table('videos')
                ->join('subchannels', 'videos.subchannel_id', '=', 'subchannels.id')
                ->join('video_collects', 'videos.id', '=', 'video_collects.collect_video_id')
                ->where('video_collects.user_id', '=', $user_id)
                ->where('subchannels.channel_id', '=', 1)
                ->get();
            $Get_Open =  DB::table('videos')
                ->join('subchannels', 'videos.subchannel_id', '=', 'subchannels.id')
                ->join('video_collects', 'videos.id', '=', 'video_collects.collect_video_id')
                ->where('video_collects.user_id', '=', $user_id)
                ->where('subchannels.channel_id', '=', 2)
                ->get();


            session()->put('sort', 'collect');
            $sort_subject = '個人收藏區';

        }elseif ($sort == 'likes') {


            $Get_Official = DB::table('videos')
                ->join('subchannels', 'videos.subchannel_id', '=', 'subchannels.id')
                ->join('video_likes', 'videos.id', '=', 'video_likes.like_video_id')
                ->where('video_likes.user_id', '=', $user_id)
                ->where('subchannels.channel_id', '=', 1)
                ->get();



            $Get_Open = DB::table('videos')
                ->join('subchannels', 'videos.subchannel_id', '=', 'subchannels.id')
                ->join('video_likes', 'videos.id', '=', 'video_likes.like_video_id')
                ->where('video_likes.user_id', '=', $user_id)
                ->where('subchannels.channel_id', '=', 2)
                ->get();

            session()->put('sort', 'likes');
            $sort_subject = '個人喜愛區';

        }



        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();                                                   //navigation需使用到

        $User_data =  DB::table('users')->where('id', '=', $user_id)->get();

        foreach ($User_data as $data){
            $user_nickname = $data->nickname;
        }

        $binding = ['title' => '檢視影片' , 'subject' => '『'.$user_nickname.'』'.'的影片'.' - '.$sort_subject,
            'Get_Official' => $Get_Official,'Get_Open' => $Get_Open,
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav];

        // 重新導向到影片區
        return view('auth.video',$binding);

    }

}
