<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\SubChannel as SubChannels;
class SubChannelController extends Controller
{
    //官方頻道
    public function list($channel)
    {
        switch ($channel){
            case 'official':
                $channel_type = '官方頻道';
                $channel_id = '1' ;
                $Get_Channel_data = DB::table('subchannels')
                    ->where('channel_id','=', $channel_id)
                    ->get();

                break;
            case 'open':
                $channel_type = '開放式頻道';
                $channel_id = '2' ;
                $Get_Channel_data = DB::table('subchannels')
                    ->where('channel_id','=',$channel_id)
                    ->get();
                break;
        }

        $binding = [
            'Get_Channel_data' => $Get_Channel_data
        ];

        session()->put('channel', $channel);
        session()->put('channel_type', $channel_type);
        session()->put('channel_id', $channel_id);

        return view('admin.subchannel.list', $binding);
    }


    public function edit($channel,$id)
    {
        $Get_SubChannel_data = DB::table('subchannels')->where('id', '=', $id)->get();

        $binding = [
            'Get_SubChannel_data' => $Get_SubChannel_data
        ];

        session()->put('channel', $channel);
        return view('admin.subchannel.edit', $binding);
    }

    public function update($channel, $id, Request $request)
    {
        $data = request()->except(['_token']);

        DB::table('subchannels')->where('id', $id)->update( $data);

        session()->put('channel', $channel);

        return redirect()->back();

    }

    //開放式頻道
    public function open_list()
    {
        $Get_OpenChannel_data = DB::table('openchannel')->get();

        $binding = [
            'Get_OpenChannel_data' => $Get_OpenChannel_data
        ];
        session()->put('channel_type', '開放式頻道');

        return view('admin.channel.list', $binding);
    }
    public function open_edit($id)
    {
        $Get_OpenChannel_data = DB::table('openchannel')->where('id', '=', $id)->get();

        $binding = [
            'Get_OpenChannel_data' => $Get_OpenChannel_data
        ];

        session()->put('channel_type', '開放式頻道');
        return view('admin.channel.edit', $binding);
    }

    public function open_update($id, Request $request)
    {
        $Get_OpenChannel_data = DB::table('openchannel')->where('id', '=', $id)->get();
        foreach ($Get_OpenChannel_data as $data){
            $openchannel_name = $data->openchannel_name;
        }
        DB::table('open_videos')
            ->where('openchannel_name', $openchannel_name)
            ->update(['openchannel_name' => $request->input('openchannel_name')]);

        $openchannel = OpenChannel::find($id);

        $openchannel ->update($request->all());


        return redirect()->back();
    }
}
