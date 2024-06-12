<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Login extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function login()
    {
        return view('Auth/login');
    }

    public function loginAction(Request $request)
    {
        Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ])->validate();

        if(!Auth::attempt($request->only('email','password'))){
            // throw ValidationException::withMessages([
            //     'email' => trans('auth.failed')
            // ]);
            return back()->with('fail','Email Ou Password Incorect');
        }
        $request->session()->regenerate();

        if(auth()->user()->blocked == true){
            return back()->with('fail','Votre Compte à été Bloquer');
        }
        
        if(auth()->user()->type == 'admin'){
            return redirect()->route('admin');
        }
        else{
            return redirect()->route('home');
        }


    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // public function logout(Request $request)
    // {
    //     Auth::guard('web')->logout();
    //     $request->session()->invalidate();
    //     return redirect()->route('login');
    // }
}
