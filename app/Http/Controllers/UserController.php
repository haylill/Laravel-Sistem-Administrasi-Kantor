<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\jabatan;
use App\Models\agama;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //get data agama
        $agama = agama::all();
        $agama = $agama->pluck('nama_agama', 'id_agama');
        //get data jabatan
        $jabatan = jabatan::all();
        $jabatan = $jabatan->pluck('nama_jabatan', 'id_jabatan');
        return view('dash.users', ['title'  => 'Users | Office Administration'
                    ,'users' => $users,
                    'jabatan' => $jabatan,
                    'agama' => $agama]);
    }
}
