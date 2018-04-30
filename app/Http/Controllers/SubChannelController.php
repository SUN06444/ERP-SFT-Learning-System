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
}
