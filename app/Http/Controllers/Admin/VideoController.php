<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Video as Videos;
class VideoController extends Controller
{
    public function list($video_type)
    {

        switch ($video_type){
            case 'official':
                session()->put('video_type', '官方影片');
                $Get_Video_data =  DB::table('subchannels')
                    ->join('videos', 'subchannels.id', '=', 'videos.subchannel_id')
                    ->join('channels', 'subchannels.channel_id', '=', 'channels.id')
                    ->where('channels.id', '=', 1)
                    ->select('subchannels.*', 'videos.*')
                    ->paginate(5);
                break;
            case 'open':
                session()->put('video_type', '開放式影片');
                $Get_Video_data =  DB::table('subchannels')
                    ->join('videos', 'subchannels.id', '=', 'videos.subchannel_id')
                    ->join('channels', 'subchannels.channel_id', '=', 'channels.id')
                    ->where('channels.id', '=', 2)
                    ->select('subchannels.*', 'videos.*')
                    ->paginate(5);
                break;
        }

            $binding = ['Get_Video_data' => $Get_Video_data];
            return view('admin.video.list', $binding);

    }

    public function edit($video_type, $status, $id)
    {
        if ($video_type == 'official' && $status == 'edit') {
            $Get_Video_data =  DB::table('subchannels')
                ->join('videos', 'subchannels.id', '=', 'videos.subchannel_id')
                ->where('videos.id', '=', $id)
                ->paginate(5);
            session()->put('video_type', '官方影片');


        } elseif ($video_type == 'open' && $status == 'edit') {

            $Get_Video_data =  DB::table('subchannels')
                ->join('videos', 'subchannels.id', '=', 'videos.subchannel_id')
                ->where('videos.id', '=', $id)
                ->paginate(5);
            session()->put('video_type', '開放式影片');
            session()->put('status', 'edit');


        } elseif ($video_type == 'open' && $status == 'note') {
            $Get_Video_data =  DB::table('subchannels')
                ->join('videos', 'subchannels.id', '=', 'videos.subchannel_id')
                ->where('videos.id', '=', $id)
                ->paginate(5);
            session()->put('video_type', '開放式影片');
            session()->put('status', 'note');
        }

        $video_data = DB::table('videos')
            ->where('id','=',$id)
            ->get();
        foreach ($video_data as $data){
            $subchannel_id = $data->subchannel_id;
        }

        $Get_Other_subchannel =  DB::table('subchannels')
            ->where('id','!=',$subchannel_id)
            ->get();


        $binding = ['Get_Video_data' => $Get_Video_data, 'Get_Other_subchannel' => $Get_Other_subchannel];
        return view('admin.video.edit', $binding);
    }

    //update
    public function update($id, Request $request)
    {

        $video = Videos::find($id);

        $video->update($request->all());

        return redirect()->back();
    }

    public function pass($id)
    {
        DB::table('videos')
            ->where('id', '=', $id)
            ->update(['status' => '1']);

        return redirect()->back();
    }

    public function nopass($id)
    {
        DB::table('videos')
            ->where('id', '=', $id)
            ->update(['status' => '2']);

        return redirect()->back();
    }


    public function note($id, Request $request)
    {
        DB::table('videos')
            ->where('id', '=', $id)
            ->update(['note' => $request->input('note')]);

        return redirect()->back();
    }

}
