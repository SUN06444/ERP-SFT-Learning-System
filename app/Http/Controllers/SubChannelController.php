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
        $binding = ['title' => '精選頻道' , 'subject' => $subject,
            'Get_OfficialChannel_data_For_Nav' => $Get_OfficialChannel_data_For_Nav,
            'Get_videos_data' => $Get_videos_data,
            'Get_subchannel_data' => $Get_subchannel_data,
            'User_Subscribe_subchannel' => $User_Subscribe_subchannel
        ];
        session()->put('sort', 'time');
        session()->put('subchannel_name', $subchannel_name);
        return view('video_area', $binding);

    }
}
