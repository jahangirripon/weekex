<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function register(Request $request)
    {
        $user = User::craete([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email' => str_random(50),
        ]);

        return response()->json(['uesr' => $user], 201);
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->where('password', bcrypt($request->password))->first();

        if(!$user) 
        {
            return response()->json(['status' => 'error', 'message' => 'Invalid Credentials'], 401);
        }
        return response()->json(['status' => 'success', 'user' => $user], 200);
    }

    public function logout()
    {
        //logout function
    }
}
