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
        if(session('user') != null)
            return redirect('/');
        else{
            return view('auth.login', ['title' => 'Login | Office Administration']);
        }
    }

    // regist view
    public function regist()
    {
        if(session('user') != null)
            return redirect('/');
        else{

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
    }
    // proses regist
    public function register()
    {
            
            $validatedData = $this->validate(request(), [
                'nik' => 'required|numeric|unique:users|digits_between:16,16',                
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'mobile' => 'required|numeric|digits_between:10,13|unique:users',
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
            $validatedData['level'] = 'User';
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

    //prosesLogin
    public function prosesLogin(Request $request){
        $user = User::where('email', $request->user)->first();
        if($user == null){
            $user = User::where('nik', $request->user)->first();
            if($user == null){
                $user = User::where('telp', $request->user)->first();
                if($user == null){                    
                    return redirect()->back()->with('message', 'User Not Found');
                }else{
                    //berhasil dengan telp
                    if(!password_verify($request->password, $user->password)){
                        return redirect()->back()->with('message', 'Password Salah');
                    }else{
                        $session = [
                            'nik' => $user->nik,
                            'email' => $user->email,
                            'telp' => $user->telp,
                            'nama' => $user->nama,
                            'alamat' => $user->alamat,
                            'tgl_lahir' => $user->tgl_lahir,
                            'jenkel' => $user->jenkel,
                            'id_agama' => $user->id_agama,
                            'id_jabatan' => $user->id_jabatan,
                            'level' => $user->level,
                            'password' => $user->password                        
                        ];
                        session(['user' => $session]);
                        return redirect('/');
                    }
                }
            }else{
                //berhasil dengan nik
                if(!password_verify($request->password, $user->password)){
                    return redirect()->back()->with('message', 'Password Salah');
                }else{
                    $session = [
                        'id' => $user->id, 
                        'nik' => $user->nik,
                        'email' => $user->email,
                        'telp' => $user->telp,
                        'nama' => $user->nama,
                        'alamat' => $user->alamat,
                        'tgl_lahir' => $user->tgl_lahir,
                        'jenkel' => $user->jenkel,
                        'id_agama' => $user->id_agama,
                        'id_jabatan' => $user->id_jabatan,
                        'level' => $user->level,
                        'password' => $user->password                        
                    ];
                    session(['user' => $session]);
                    return redirect('/')->with('message', 'Success Login');
                }
            }
        }else{
            //berhasil dengan email
            if(!password_verify($request->password, $user->password)){
                return redirect()->back()->with('message', 'Password Salah');
            }else{
                $session = [
                    'nik' => $user->nik,
                    'email' => $user->email,
                    'telp' => $user->telp,
                    'nama' => $user->nama,
                    'alamat' => $user->alamat,
                    'tgl_lahir' => $user->tgl_lahir,
                    'jenkel' => $user->jenkel,
                    'id_agama' => $user->id_agama,
                    'id_jabatan' => $user->id_jabatan,
                    'level' => $user->level,
                    'password' => $user->password                        
                ];
                session(['user' => $session]);
                return redirect('/');
            }
        }
    }

    //logout
    public function logout()
    {
        session()->forget('user');
        return redirect('/login')->with('message', 'Logout Success');
    }
}
