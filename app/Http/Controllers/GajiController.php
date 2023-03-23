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

    // view salary users
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


    //proses Update salary
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

     // view salary management
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

    // exportsalary 
    public function exportsalary(){
        $users = User::all();
        $penggajian = penggajian::all();
        if($penggajian->count()< 1){
            return redirect('/salary-management')->with('error', 'Sorry, Data Salary Empty');
        }else{
            $datereq = request()->date;
            if($datereq =='all'){
                $datacsv = array();
                foreach($users as $user){
                    foreach($penggajian as $gaji){
                        if($user->id_karyawan == $gaji->id_karyawan){
                            //push data
                            array_push($datacsv, array(
                                'NIK' => $user->nik,
                                'Name' => $user->nama,      
                                'Email' => $user->email,
                                'Total Entry' => $gaji->total_masuk,                          
                                'Total Salary' => $gaji->total_gaji,                                
                                'Date & Time' => $gaji->created_at->format('d-m-Y')
                            ));
                        }
                    }
                }
                $filename = $datereq. " Salary-".date('d-m-Y').".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('NIK', 'Name', 'Email', 'Total Entry', 'Total Salary', 'Date & Time'));
                foreach($datacsv as $row) {
                    fputcsv($handle, array ($row['NIK'], $row['Name'], $row['Email'], $row['Total Entry'], $row['Total Salary'], $row['Date & Time']));
                }
                fclose($handle);
                $headers = array(
                    'Content-Type' => 'text/csv',
                );
                return response()->download($filename, $filename, $headers);
            }else{
                $penggajian = penggajian::whereMonth('created_at', substr($datereq, 0, 2))->whereYear('created_at', substr($datereq, 3, 4))->get();
                $datacsv = array();
                foreach($users as $user){
                    foreach($penggajian as $gaji){
                        if($user->id_karyawan == $gaji->id_karyawan){
                            //push data
                            array_push($datacsv, array(
                                'NIK' => $user->nik,
                                'Name' => $user->nama,      
                                'Email' => $user->email,
                                'Total Entry' => $gaji->total_masuk,                          
                                'Total Salary' => $gaji->total_gaji,                                
                                'Date & Time' => $gaji->created_at->format('d-m-Y')
                            ));
                        }
                    }
                }
                $filename = $datereq. " Salary-".date('d-m-Y').".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('NIK', 'Name', 'Email', 'Total Entry', 'Total Salary', 'Date & Time'));
                foreach($datacsv as $row) {
                    fputcsv($handle, array ($row['NIK'], $row['Name'], $row['Email'], $row['Total Entry'], $row['Total Salary'], $row['Date & Time']));
                }
                fclose($handle);
                $headers = array(
                    'Content-Type' => 'text/csv',
                );
                return response()->download($filename, $filename, $headers);
                
            }
        }
    }

}
