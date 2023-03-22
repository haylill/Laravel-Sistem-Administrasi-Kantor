<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\jabatan;

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
            $absen = absensi::where('id_karyawan', $id->id_karyawan)->whereDate('created_at', date('Y-m-d'))->first();
            $id = $id->id_karyawan;
            return view('dash.absent', ['title' => 'Absent | Office Administration', 'absen' => $absen , 'id' => $id]);
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
        $user = session()->get('user');
        if($user){
            // insert data absent
            $absen = new absensi;
            $absen->id_karyawan = request('id_karyawan');
            $absen->waktu = date('Y-m-d H:i:s');

            if($absen->save())
            {
                return redirect('/absent')->with('message', 'Success Absent');                
            }else{
                return redirect('/absent')->with('error', 'Sorry,Error Absent');
            }


        }else{
            return redirect('/login');
        }
    }

    public function absentmanagement(){
        $user = session()->get('user');
        if($user){
            $absens = absensi::all();
            $users = User::all();
            // mengambil data bulan dan tahun di $absens
            $date = $absens->pluck('created_at')->map(function($item){
                return $item->format('m-Y');
            })->unique()->toArray();

            // dd($date);
            return view('dash.absentmanagement', ['title' => 'Absence Management | Office Administration', 'absens' => $absens , 'users'=>$users , 'date' => $date]);
        }else{
            return redirect('/login');
        }
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
