<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestFormLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(RequestFormLogin $request)
    {
        $data=[
            'email' => $request->email,
            'password'=>$request->password
        ];
        $remember = $request->remember;
        if (Auth::attempt($data,$remember)){
            return redirect('/admin');
        }
        return back()->with("Wrong","Wrong password! Try again!");
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
