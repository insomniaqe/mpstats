<?php

namespace App\Http\Controllers;

use App\Models\Tranning;
use App\Models\User;
use App\Models\UserMain;
use http\Env\Response;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mailgun\Mailgun;

class UserMainController extends Controller
{
    public function authByPassword(Request $request)
    {
        $user = DB::table('mpstats_users')->where('password', md5($request->password))->first();
        if ($user) {
            $token = $this->createToken($user->id);
            return response()->json([
                'status' => 'success',
                'token' => $token
            ])->setStatusCode(201, 'success');
        } else {
            return response()->json([
                'status' => 'error',
            ])->setStatusCode(201, 'error');
        }
    }

    public function authByPasswordAdmin(Request $request)
    {
        $user = DB::table('mpstats_users')->where('password', md5($request->password))->where('role', 'admin')->first();
        if ($user) {
            $token = $this->createToken($user->id);
            return response()->json([
                'status' => 'success',
                'token' => $token
            ])->setStatusCode(201, 'success');
        } else {
            return response()->json([
                'status' => 'error',
            ])->setStatusCode(201, 'error');
        }
    }

    public function getUsers()
    {
        $data = DB::table('mpstats_users')->where('id', '>', 0)->get();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ])->setStatusCode(200, 'OK');
    }

    public function createToken($userId)
    {
        $token = Str::random(30);
        DB::table('mpstats_users')->where('id', $userId)->update(['token' => $token]);
        return $token;
    }

    public function getUserInfoProfile(Request $request)
    {

        return response()->json([
            'status' => 'success',
            'usedData' => Auth::user(),
            'time' => date('d.m.Y', time()),
        ]);
    }


}
