<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index()
    {
        $tamu= tamu::all();
        return view('auth.tamu', ['title' => 'Tamu | Office Administration'])->with('tamu', $tamu);
    }

    //menyimpan data
    public function input(Request $request)
    {
        $requestData = $request->all();
        tamu::create([
            'nama' => $request['nama'],
            'waktu_kunjung'=> $request['waktu_kunjung'],
            'jenkel'=>$request['jenkel'],
            'telp'=>($request['telp']),
            'email'=>($request['email']),
            'alamat'=>$request['alamat'],
            'tujuan'=>($request['tujuan']),
            
        ]);
        return redirect('tamu')->with('flash_message', 'Input Addedd!'); 
    }
}
