<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // login view
    public function login()
    {
        return view('auth.login');
    }

    // regist view
    public function regist()
    {
        return view('auth.regist');
    }
}
