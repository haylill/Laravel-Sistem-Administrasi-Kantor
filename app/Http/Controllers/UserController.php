<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\jabatan;
use App\Models\agama;
use App\Models\gaji;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //view users
    public function index()
    {
        if(session('user') == null){
            return redirect('/login')->with('message', 'Sorry, You must login first!');
        }else{
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
    //create data users in authController
    public function registeruser()
    {
            
            $validatedData = $this->validate(request(), [
                'nik' => 'required|numeric|unique:users|digits_between:16,16',                
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'telp' => 'required|numeric|digits_between:10,13|unique:users',
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
                'telp' => $validatedData['telp'],
                'nama' => $validatedData['name'],
                'alamat' => $validatedData['address'],
                'tgl_lahir' => $validatedData['birthday'],
                'jenkel' => $validatedData['gender'],
                'id_agama' => $validatedData['id_agama'],
                'id_jabatan' => $validatedData['id_jabatan'],
                'level' => $validatedData['level'],
            ];
             //insert data
             $user = User::create($insertData);
             //get id user
             $iduser = User::where('nik', $validatedData['nik'])->first();
             $iduser = $iduser->id_karyawan;
             //insert data to table gaji data
             $gaji = gaji::create([
                 'id_karyawan' => $iduser,                 
                 'gaji' => 0,
                 'bonus' => 0
             ]);
             if($user && $gaji){
                 return redirect('/users')->with('message', 'Profile updated!');
             }else{
                 return redirect('/users')->with('errors', 'Profile updated!');
             }
    }

    //delete data users
    public function delete($nik)
    {
        // get session user
        $sessionUser = session('user');
        if($sessionUser['nik'] == $nik){
            return redirect('/users')->with('error', 'User cannot deleted!');
        };

        $user = User::where('nik', $nik)->delete();
        return redirect('/users')->with('error', 'User Deleted!');
    }

    //update data user
    public function updateuser(){
        $sessionUser = session('user');
        if($sessionUser['nik'] == request('nikupdate')){
            return redirect('/users')->with('error', 'User cannot updated!');
        };
        $user = User::where('nik', request('nikupdate'))->first();
        if($user->level ==request('level')){
            return redirect('/users')->with('error', 'User dont change!');
        }else{
            // update data level user by nik
            $user = User::where('nik', request('nikupdate'))->update(['level' => request('level')]);
            return redirect('/users')->with('message', 'User Updated!');
        }

    }
}
