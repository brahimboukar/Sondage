<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login (LoginRequest $request)
    {
        $request->validated();

        $user = User::whereEmail($request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'msg' => 'Email Ou Password Incorect'
            ],422);
        }

        $token = $user->createToken('sondageapp')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token
        ],200);
    }
}
