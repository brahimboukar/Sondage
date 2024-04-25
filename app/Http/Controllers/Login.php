<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Login extends Controller
{
    public function login()
    {
        return view('Auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if(!Auth::attempt($request->only('email','password'))){
            // throw ValidationException::withMessages([
            //     'email' => trans('auth.failed')
            // ]);
            return back()->with('fail','Email Ou Password Incorect');
        }
        $request->session()->regenerate();
        
        if(auth()->user()->type == 'admin'){
            return redirect()->route('admin/home');
        }
        else{
            return redirect()->route('home');
        }

    }
}
