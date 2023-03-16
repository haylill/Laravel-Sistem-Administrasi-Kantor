<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use Illuminate\Http\Request;
use App\Models\User;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = session()->get('user');
        if($user){
            // cari id berdasarkan nik
            $id = User::where('nik', $user['nik'])->first();
            // // cari data absen berdasarkan id dan di tanggal hari ini
            // $absen = absensi::where('id_user', $id->id_karyawan)->whereDate('created_at', date('Y-m-d'))->first();
            dd($id);
            return view('dash.absent', ['title' => 'Absent | Office Administration']);
        }else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(absensi $absensi)
    {
        //
    }
}
