<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Video;
use Validator;  // 驗證器
use App\Video_Like;
use App\Video_Collect;
use App\SubChannel;
use App\SubChannel_Subscribe;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class SubChannelController extends Controller
{
    public function index_articles()
    {
        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        $binding = ['title' => '教學案例' , 'subject' => '蛋黃酥 - 案例教學 (ERP整合SFT)',
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav,
        ];

        return view('articles', $binding);
    }

    public function faq()
    {
        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        $binding = ['title' => '常見問題' , 'subject' =>'FAQ - 常見問題',
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav,
        ];

        return view('faq', $binding);
    }

    // 首頁 頁面
    public function index(){

        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        $Get_Official_new =  DB::table('videos')
            ->join('subchannels', 'subchannels.id', '=', 'videos.subchannel_id')
            ->where('channel_id','=','1')
            ->orderBy('videos.updated_at', 'desc')
            ->limit(6)
            ->get();

        $Get_Official_hot =  DB::table('videos')
            ->join('subchannels', 'subchannels.id', '=', 'videos.subchannel_id')
            ->where('channel_id','=','1')
            ->orderBy('videos.views_num', 'desc')
            ->limit(3)
            ->get();

        $Get_Open_new =  DB::table('videos')
            ->join('subchannels', 'subchannels.id', '=', 'videos.subchannel_id')
            ->where('channel_id','=','2')
            ->orderBy('videos.updated_at', 'desc')->limit(6)
            ->get();

        $Get_Open_hot =  DB::table('videos')
            ->join('subchannels', 'subchannels.id', '=', 'videos.subchannel_id')
            ->where('channel_id','=','2')
            ->orderBy('videos.views_num', 'desc')->limit(3)
            ->get();

        $binding = ['title' => '教學影片' , 'subject' => '教學影片區',
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav,
            'Get_Official_new' => $Get_Official_new,
            'Get_Open_new' => $Get_Open_new,
            'Get_Official_hot' => $Get_Official_hot,
            'Get_Open_hot' => $Get_Open_hot];

        return view('index', $binding);
    }

    // 開放式頻道 頁面
    public function subchannelPage(){

        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        $Get_openchannel_data = DB::table('subchannels')
            ->where('channel_id','=','2')
            ->orderBy('updated_at', 'desc')
            ->get();

        $binding = ['title' => '開放式頻道' , 'subject' => '開放式頻道',
            'Get_openchannel_data' => $Get_openchannel_data,
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav];

        return view('subchannel', $binding);
    }

    // 頻道頁面(含多部影片頁面)
    public function video_areaPage($subchannel_name){

        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        //取得子頻道的資料
        $Get_subchannel_data = DB::table('subchannels')
            ->where('name','=',$subchannel_name)
            ->get();

        //取得子頻道的id
        foreach ($Get_subchannel_data as $subchannel_data){
            $subchannel_id = $subchannel_data->id;
            $channel_id = $subchannel_data->channel_id;
        }

        //查詢子頻道底下的所有影片
        $Get_videos_data = DB::table('videos')
            ->where('subchannel_id', '=', $subchannel_id)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        //判斷會員是否已訂閱頻道
        $User_Subscribe_subchannel = DB::table('subchannel_subscribes')
            ->where('user_id', '=', session('user_id'))
            ->where('subchannel_id','=',$subchannel_id)
            ->get();

        $subject = '「'.$subchannel_name.'」';

        if($channel_id == 1){
            $title = '官方頻道';
        }elseif ($channel_id == 2){
            $title = '開放式頻道';
        }

        $binding = ['title' => $title , 'subject' => $subject,
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav,
            'Get_videos_data' => $Get_videos_data,
            'Get_subchannel_data' => $Get_subchannel_data,
            'User_Subscribe_subchannel' => $User_Subscribe_subchannel
        ];
        session()->put('sort', 'time');
        session()->put('subchannel_name', $subchannel_name);
        session()->put('subchannel_id', $subchannel_id);
        return view('video_area', $binding);

    }

    public function addsubchannelProcess()
    {


        //判断请求中是否包含name=img的上传文件
        if (!Input::hasFile('photo')) {
            exit("请选择上传图片， <a href=''>返回上一页！</a>");
        }
        // 判断图片上传中是否出错
        $file = Input::file('photo');
        if (!$file->isValid()) {
            exit("上传图片出错，请重试，<a href=''>返回上一页！</a>");
        }
        //$img_path = $file -> getRealPath(); // 获取临时图片绝对路径
        $entension = $file -> getClientOriginalExtension(); //  上传文件后缀
        $filename = date('YmdHis').mt_rand(100,999).'.'.$entension;  // 重命名图片
        $date = date('Y-m-d');
        $path = $file->move(public_path().'/uploads/'.$date.'/',$filename);  // 重命名保存
        $photo_path = 'uploads/'.$date.'/'.$filename;
        //return $photo_path;


        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            'name'=> [
                'required',
                'max:30',
            ],
            'color' => [
                'required',
            ],
            'description' => [
                'required',
                'max:300',
            ],

        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        SubChannel::create([
            'name'=>$input->name,
            'color'=>$input->color,
            'photo'=>$photo_path,
            'description'=>$input->description,
        ]);

        // 重新導向到開放式頻道頁面
        return redirect()->back();

    }

    // 頻道(分類頁面)
    public function video_area_sortPage($subchannel_name, $sort){

        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();

        //取得子頻道的資料
        $Get_subchannel_data = DB::table('subchannels')
            ->where('name','=',$subchannel_name)
            ->get();

        //取得子頻道的id
        foreach ($Get_subchannel_data as $subchannel_data){
            $subchannel_id = $subchannel_data->id;
            $channel_id = $subchannel_data->channel_id;
        }

        if($sort == 'time' ){
            $Get_videos_data = DB::table('videos')->where('subchannel_id', '=', $subchannel_id)->orderBy('updated_at', 'desc')->paginate(5);
            session()->put('sort', $sort);
        }elseif ($sort == 'views'){
            $Get_videos_data = DB::table('videos')->where('subchannel_id', '=', $subchannel_id)->orderBy('views_num', 'desc')->paginate(5);
            session()->put('sort', $sort);
        }elseif ($sort == 'likes'){
            $Get_videos_data = DB::table('videos')->where('subchannel_id', '=', $subchannel_id)->orderBy('likes_num', 'desc')->paginate(5);
            session()->put('sort', $sort);
        }

        //判斷會員是否已訂閱頻道
        $User_Subscribe_subchannel = DB::table('subchannel_subscribes')
            ->where('user_id', '=', session('user_id'))
            ->where('subchannel_id','=',$subchannel_id)
            ->get();

        $subject = '「'.$subchannel_name.'」';

        if($channel_id == 1){
            $title = '官方頻道';
        }elseif ($channel_id == 2){
            $title = '開放式頻道';
        }

        $binding = ['title' => $title , 'subject' =>  $subject,
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav ,
            'Get_videos_data' => $Get_videos_data,
            'Get_subchannel_data' => $Get_subchannel_data,
            'User_Subscribe_subchannel' => $User_Subscribe_subchannel
        ];

        session()->put('subchannel_name', $subchannel_name);
        return view('video_area', $binding);

    }

    // 新增影片
    public function addvideosProcess(){

        // 接收輸入資料
        $input = request()->all();

        // 驗證規則
        $rules = [
            // Title
            'title'=> [
                'required',
                'max:30',
            ],
            // Author
            'author' => [
                'required',
                'max:20',
            ],
            // Video_ID
            'video_id' => [
                'required',
                'max:40',
            ],
            // Content
            'content' => [
                'required',
                'max:150',
            ],
        ];

        // 驗證資料
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            // 資料驗證錯誤
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $Videos = Video::create($input);

        //以下為處理訂閱頻道的會員，以信件通知
        $subchannel_id = $input['subchannel_id'];

        $get_subchannel_data = DB::table('subchannels')
            ->where('id', '=', $subchannel_id)
            ->get();

        foreach ($get_subchannel_data as $data){
            $subchannel_name= $data->name;
        }

        $get_user_subscribe = DB::table('subchannel_subscribes')
            ->where('subchannel_id', '=', $subchannel_id)
            ->count();

        if($get_user_subscribe>0){

            $get_user_data = DB::table('users')
                ->where('id', '=', session('user_id'))
                ->get();

            foreach ($get_user_data as $user_data){
                $nickname = $user_data->nickname;
                $email = $user_data->email;
            }

            // 寄送註冊通知信
            $mail_binding = [
                'nickname' => $nickname,
                'email' =>  $email,
                'subchannel_name' => $subchannel_name
            ];

            Mail::send('email.subscribeEmailNotification', $mail_binding,
                function ($mail) use ($mail_binding){
                    //收件人
                    $mail->to($mail_binding['email']);
                    //寄件人
                    $mail->from('3a432016@gm.student.ncut.edu.tw');
                    //郵件主旨
                    $subject = '[通知]'.'「'.$mail_binding['subchannel_name'].'」'.'頻道，又出新影片囉~';
                    $mail->subject($subject);
                });
        }

        // 重新導向到影片區
        return redirect()->back();

    }

    // 影片內容id對id
    public function videoPage($subchannel_id, $video_id){

        $Get_OfficialChannel_data_For_Nav = DB::table('subchannels')
            ->where('channel_id','=','1')
            ->get();


        $Get_videos_data = DB::table('videos')->where('id', '=', $video_id)->get();
        foreach ($Get_videos_data as $videos_data){
            $views_num = $videos_data->views_num;//取得觀看人數
            $subject = $videos_data->title; //取得影片標題
        }

        //更新觀看次數(點擊後+1)
        DB::table('videos')
            ->where('id', $video_id)
            ->update(['views_num' => $views_num + 1]);

        //找尋相類似頻道的影片
        $SimilarVideos = DB::table('videos')
            ->where('subchannel_id', '=', $subchannel_id)
            ->where('id', '!=', $video_id)
            ->paginate(4);

        //計算喜愛人數
        $Video_likes_num = DB::table('video_likes')
            ->where('like_video_id','=',$video_id)
            ->count();

        //更新videos資料庫的喜愛人數
        DB::table('videos')
            ->where('id', $video_id)
            ->update(['likes_num' => $Video_likes_num]);

        //取得會員like的影片資料(判斷是否已加入喜愛)
        $User_Like_Video = DB::table('video_likes')
            ->where('user_id', '=', session('user_id'))
            ->where('like_video_id','=',$video_id)
            ->get();

        //取得會員collect的影片資料(判斷是否已加入收藏)
        $User_Collect_Video = DB::table('video_collects')
            ->where('user_id', '=', session('user_id'))
            ->where('collect_video_id','=',$video_id)
            ->get();


        $binding = ['title' => '精選影片' , 'subject' => $subject,
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav,
            'Get_videos_data' => $Get_videos_data , 'SimilarVideos' => $SimilarVideos,
            'User_Like_Video' => $User_Like_Video,
            'Video_likes_num' => $Video_likes_num,
            'User_Collect_Video' => $User_Collect_Video
        ];

        $subchannel_data = DB::table('subchannels')->where('id','=',$subchannel_id)->get();
        foreach ($subchannel_data as $data){
            $subchannel_name =  $data->name;
        }
        session()->put('subchannel_name', $subchannel_name);
        // 重新導向到影片區
        return view('video', $binding);

    }

    public function video_eventProcess($video_id,$event){

        //查詢使用者like的影片數量(一部影片只能有一筆喜愛資料)
        $video_like_limit = DB::table('video_likes')->where('user_id', '=', session('user_id'))->where('like_video_id', '=', $video_id)->count();
        //查詢使用者collect的影片數量(一部影片只能有一筆收藏資料)
        $video_collect_limit = DB::table('video_collects')->where('user_id', '=', session('user_id'))->where('collect_video_id', '=', $video_id)->count();

        if($event == 'like' || $event == 'collect' ){

            //當使用者點擊like事件時，或者collect事件時
            if($event == 'like' ){
                if ($video_like_limit == 0){ //先判斷影片是否尚未加入like
                    Video_Like::create(array('user_id' => session('user_id'), 'like_video_id' => $video_id));

                }

            }elseif ($event == 'collect') {
                if ($video_collect_limit == 0) { //先判斷影片是否尚未加入collect
                    Video_Collect::create(array('user_id' => session('user_id'), 'collect_video_id' => $video_id));
                }
            }

        }elseif ($event == 'dislike' || $event == 'discollect' ){
            //當使用者點擊dislike事件時，或者discollect事件時
            if($event == 'dislike' ){
                if ($video_like_limit == 1){
                    DB::table('video_likes')
                        ->where('user_id', '=', session('user_id'))
                        ->where('like_video_id', '=', $video_id)
                        ->delete();
                }
            }elseif ($event == 'discollect') {
                if ($video_collect_limit == 1){
                    DB::table('video_collects')
                        ->where('user_id', '=', session('user_id'))
                        ->where('collect_video_id', '=', $video_id)
                        ->delete();
                }
            }
        }

        //取得影片資料
        $Get_videos_data = DB::table('videos')->where('id', '=', $video_id)->get();
        foreach ($Get_videos_data as $videos_data){
            $views_num = $videos_data->views_num;  //取得觀看人數
        }
        //觀看次數-1，防止頁面重整後又多增加一次瀏覽
        DB::table('videos')
            ->where('id', $video_id)
            ->update(['views_num' => $views_num-1]);

        // 重新導向到影片區
        return redirect()->back();

    }

    public function subscribe_channelProcess($subnchannel_name, $user_id){

        $Get_subchannel_data = DB::table('subchannels')->where('name', '=', $subnchannel_name)->get();
        //取得開放頻道id
        foreach ($Get_subchannel_data as $subchannel_data){
            $subchannel_id = $subchannel_data->id;
        }

        //查詢使用者訂閱的影片數量(一部影片只能有一筆訂閱資料)
        $subchannel_subscribe_limit = DB::table('subchannel_subscribes')
            ->where('user_id', '=', session('user_id'))
            ->where('subchannel_id', '=', $subchannel_id)
            ->count();

        if ($subchannel_subscribe_limit == 0){
            SubChannel_Subscribe::create(array('user_id' => $user_id, 'subchannel_id' => $subchannel_id));
        }

        // 重新導向到影片區
        return redirect()->back();

    }

    public function dissubscribe_channelProcess($subnchannel_name, $user_id){

        $Get_subchannel_data = DB::table('subchannels')->where('name', '=', $subnchannel_name)->get();
        //取得開放頻道id
        foreach ($Get_subchannel_data as $subchannel_data){
            $subchannel_id = $subchannel_data->id;
        }

        //查詢使用者訂閱的影片數量(一部影片只能有一筆訂閱資料)
        $subchannel_subscribe_limit = DB::table('subchannel_subscribes')
            ->where('user_id', '=', session('user_id'))
            ->where('subchannel_id', '=', $subchannel_id)
            ->count();

        if ($subchannel_subscribe_limit == 1){
            DB::table('subchannel_subscribes')
                ->where('user_id', '=',$user_id)
                ->where('subchannel_id', '=', $subchannel_id)
                ->delete();
        }

        // 重新導向到影片區
        return redirect()->back();

    }
}
