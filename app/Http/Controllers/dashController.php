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
        // get data user from user
        if($user){
            $data = User::where('id_karyawan', $user['id'])->get();
             //get data agama
             $agama = agama::all();
             $agama = $agama->pluck('nama_agama', 'id_agama');
             //get data jabatan
             $jabatan = jabatan::all();
             $jabatan = $jabatan->pluck('nama_jabatan', 'id_jabatan');
            return view('dash.index', ['title' => 'Dashboard | Office Administration',
                                        'user' => $data,
                                        'agama' => $agama,
                                        'jabatan' => $jabatan]);
        }else{
            return redirect('/login')->with('message', 'Sorry, You must login first!');
        }
    }
}
