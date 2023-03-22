<?php

namespace App\Http\Controllers;

use App\Models\gaji;
use App\Models\penggajian;
use App\Models\User;
use Illuminate\Http\Request;


class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('user') != null){
            $gajis = gaji::all();
            $users = User::all();
            return view('dash.salary', ['title' => 'Salary | Office Administration' , 'gajis' =>$gajis, 'users' => $users]);

        }
        else{
            
            return view('auth.login', ['title' => 'Login | Office Administration']);
        }
    }

    public function updatesalary(){
        $nik = request()->nikupdate;
        $users = User::where('nik',$nik)->first();
        $iduser = $users->id_karyawan;
        
        $gaji = request()->salaryupdate;
        $bonus = request()->bonusupdate;
        
        $modelgaji = gaji::where('id_karyawan', $iduser)->first();
        
        // check if gaji is updated
        if($modelgaji->gaji != $gaji || $modelgaji->bonus != $bonus){
            $gajiuser = gaji::where('id_karyawan', $iduser)->update(['gaji' => $gaji , 'bonus' => $bonus]);
            return redirect('/salary-users')->with('message', 'Salary Updated!');
        }else{
            return redirect('/salary-users')->with('error', 'Salary dont change!');
        }        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salarymanagement()
    {
        if(session('user') != null){
            $gajis = penggajian::all();
            $users = User::all();
            $date = $gajis->pluck('created_at')->map(function($item){
                return $item->format('m-Y');
            })->unique()->toArray();

            return view('dash.salarymanagement', ['title' => 'Salary Management | Office Administration' , 'gajis' =>$gajis, 'users' => $users , 'dates' => $date]);

        }
        else{
            
            return view('auth.login', ['title' => 'Login | Office Administration']);
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
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function show(gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function edit(gaji $gaji)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gaji  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(gaji $gaji)
    {
        //
    }
}
