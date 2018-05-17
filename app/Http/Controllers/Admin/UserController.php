<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //管理人員
    public function admin_list()
    {

        $Get_AdminUser_data = DB::table('users')->where('type', '=', 'A')->paginate(5);

        $binding = [
            'Get_AdminUser_data' => $Get_AdminUser_data
        ];

        session()->put('user_type', '管理員');

        return view('admin.user.list', $binding);

    }

    public function admin_edit($id)
    {
        $Get_AdminUser_data = DB::table('users')
            ->where('id', '=', $id)
            ->where('type', '=', 'A')
            ->get();

        $binding = [
            'Get_AdminUser_data' => $Get_AdminUser_data
        ];

        session()->put('channel_type', '管理員');
        return view('admin.user.edit', $binding);
    }

    public function admin_update($id, Request $request)
    {

        DB::table('users')
            ->where('id', '=', $id)
            ->update(['note' => $request->input('note')]);

        return redirect()->back();
    }

    //一般會員
    public function general_list()
    {

        $Get_GeneralUser_data = DB::table('users')->where('type', '=', 'G')->paginate(5);

        $binding = [
            'Get_GeneralUser_data' => $Get_GeneralUser_data
        ];

        session()->put('user_type', '一般會員');

        return view('admin.user.list', $binding);

    }

    public function general_edit($id)
    {
        $Get_GeneralUser_data = DB::table('users')
            ->where('id', '=', $id)
            ->where('type', '=', 'G')
            ->get();

        $binding = [
            'Get_GeneralUser_data' => $Get_GeneralUser_data
        ];

        session()->put('channel_type', '一般會員');
        return view('admin.user.edit', $binding);
    }

    public function general_update($id, Request $request)
    {

        DB::table('users')
            ->where('id', '=', $id)
            ->update(['note' => $request->input('note')]);

        return redirect()->back();
    }
}
