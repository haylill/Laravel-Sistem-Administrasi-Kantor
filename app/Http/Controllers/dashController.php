<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jabatan;
use App\Models\agama;
use App\Models\User;
class dashController extends Controller
{
    public function index()
    {
        // get user from session
        $user = session()->get('user');
        // dd($user['level']);
        // get data user from user        
        if($user){            
            return view('dash.index', ['title' => 'Dashboard | Office Administration']);
            // return view('dashboard.index', ['title' => 'Dashboard | Office Administration']);
        }else{
            return redirect('/login');
        }
    }
}
