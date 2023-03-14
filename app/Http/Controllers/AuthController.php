<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // login view
    public function login()
    {
        return view('auth.login', ['title' => 'Login | Office Administration']);
    }

    // regist view
    public function regist()
    {
        return view('auth.regist' , ['title' => 'Regist | Office Administration']);
    }

    public function register()
    {

    }
}
