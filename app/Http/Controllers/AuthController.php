<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jabatan;
use App\Models\agama;
use App\Models\User;

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
        //get data agama
        $agama = agama::all();
        $agama = $agama->pluck('nama_agama', 'id_agama');
        //get data jabatan
        $jabatan = jabatan::all();
        $jabatan = $jabatan->pluck('nama_jabatan', 'id_jabatan');
        return view('auth.regist' , [
            'title' => 'Regist | Office Administration',
            'jabatan' => $jabatan,
            'agama' => $agama
    
        ]);
    }

    public function register()
    {
            
            $validatedData = $this->validate(request(), [
                'nik' => 'required|numeric|unique:users|digits_between:16,16',                
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'mobile' => 'required|numeric|digits_between:10,13',
                'name' => 'required',
                'address' => 'required',
                'birthday' => 'required|date|before:today',
                'gender' => 'required',
                'religion' => 'required',
                'jabatan' => 'required',
            ]);
            
            if($validatedData['gender'] == "0"){
                $validatedData['gender'] = "Laki-laki";
            }else{
                $validatedData['gender'] = "Perempuan";
            }

            $validatedData['password'] = bcrypt($validatedData['password']);
            $validatedData['level'] = 'user';
            // mengubah string religion dan jabatan menjadi integer
            $validatedData['id_agama'] = (int)$validatedData['religion'];
            $validatedData['id_jabatan'] = (int)$validatedData['jabatan'];
            //make new data
            $insertData = [
                'nik' => $validatedData['nik'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'telp' => $validatedData['mobile'],
                'nama' => $validatedData['name'],
                'alamat' => $validatedData['address'],
                'tgl_lahir' => $validatedData['birthday'],
                'jenkel' => $validatedData['gender'],
                'id_agama' => $validatedData['id_agama'],
                'id_jabatan' => $validatedData['id_jabatan'],
                'level' => $validatedData['level'],
            ];

            // dd($insertData);
            $user = User::create($insertData);
            if($user){
                return redirect('/login')->with('message', 'Profile updated!');
            }else{
                return redirect('/regist')->with('errors', 'Profile updated!');
            }
        
    }
}
