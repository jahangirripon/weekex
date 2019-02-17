<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'api_token' => str_random(50),
        ]);

        return response()->json(['uesr' => $user], 201);
    }

    public function login(Request $request)
    {
        //$user = User::where('email', $request->email)->first();
        $user = User::where('email', $request->email)->first();

        if(!$user) 
        {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 401);
        }

        if(Hash::check($request->password, $user->password))
        {
            return response()->json(['status' => 'success', 'user' => $user], 200);    
        }

        return response()->json(['status' => 'error', 'message' => 'Wrong password'], 401);
        
    }

    public function logout(Request $request)
    {
        //logout function
        $api_token = $request->api_token;

        $user = User::where('api_token', $api_token)->first();

        if(!$user) 
        {
            return response()->json(['status' => 'error', 'message' => 'Not logged in'], 401);
        }

        $user->api_token = null;

        $user->save();
    }
}
