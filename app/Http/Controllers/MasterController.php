<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class MasterController extends Controller
{
    public function masterdashboard()
    {
        $user_count = DB::table('admins')
            ->where('role', '!=', 1)
            ->count();
        $pending = DB::table('admins')
            ->where('role', 0)
            ->count();

        return view('master.dashboard', [
            'user_count' => $user_count, 'pending_count' => $pending,
        ]);
    }

    public function masteruser()
    {
        $data = DB::table('admins')
            ->where('role', 2)
            ->get();
        return view('master.user', ['users' => $data]);
    }

    public function masterpending()
    {
        $data = DB::table('admins')
            ->where('role', 0)
            ->get();
        $count = DB::table('admins')
            ->where('role', 0)
            ->count();
        return view('master.pending', ['pending_users' => $data, 'data_length' => $count]);
    }

    public function masterlogout()
    {
        Session::forget('mastersuccess');
        return redirect('/admin');
    }

    public function acceptUser(Request $request)
    {
        $uid = $request->input('uid');
        DB::table('admins')
            ->where('id', $uid)
            ->update([
                'role' => 2
            ]);
        return response()->json(['success' => true]);
    }

    public function rejectUser(Request $request)
    {
        $uid = $request->input('uid');
        DB::table('admins')
            ->where('id', $uid)
            ->delete();
        return response()->json(['success' => true]);
    }
}
