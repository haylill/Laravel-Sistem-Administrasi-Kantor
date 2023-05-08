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

    public function show()
    {
        $tamu= tamu::all();
        return view('dash.tamuu', ['title' => 'Tamu | Office Administration'])->with('tamu', $tamu);
    }

    //menyimpan data
    public function input(Request $request)
    {
        // dd($request->all());
        Tamu::create($request->all());
        return redirect('tamu')->with('message', 'Input Addedd!');    
    }
}
