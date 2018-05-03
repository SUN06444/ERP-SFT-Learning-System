<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubChannelController extends Controller
{
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

    // 頻道頁面(多部影片頁面)
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
        return view('video_area', $binding);

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
        $SimilarVideos = DB::table('videos')->where('subchannel_id', '=', $subchannel_id)->where('id', '!=', $video_id)->get();

        //計算喜愛人數
        $Video_likes_num = DB::table('video_likes')
            ->where('video_id','=',$video_id)
            ->count();

        //更新videos資料庫的喜愛人數
        DB::table('videos')
            ->where('id', $video_id)
            ->update(['likes_num' => $Video_likes_num]);

        //取得會員like的影片資料(判斷是否已加入喜愛)
        $User_Like_Video = DB::table('video_likes')
            ->where('user_id', '=', session('user_id'))
            ->where('video_id','=',$video_id)
            ->get();

        //取得會員collect的影片資料(判斷是否已加入收藏)
        $User_Collect_Video = DB::table('video_collects')
            ->where('user_id', '=', session('user_id'))
            ->where('video_id','=',$video_id)
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
}
