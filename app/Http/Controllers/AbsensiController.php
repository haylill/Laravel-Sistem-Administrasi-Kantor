<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\jabatan;

class AbsensiController extends Controller
{
    // view absennt 
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
            return redirect('/login')->with('message', 'Sorry, You must login first!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // proses create absent insert
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
            return redirect('/login')->with('message', 'Sorry, You must login first!');
        }
    }

    //view absent management 
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
            return redirect('/login')->with('message', 'Sorry, You must login first!');
        }
    }

    //proses exportabsent
    public function exportabsent(){
        $absens = absensi::all();
        $users = User::all();
        // check data if not null
        if($absens->count() > 0){
            $datereq = request()->date;
            if($datereq != "all"){
                $absens = absensi::whereMonth('created_at', substr($datereq, 0, 2))->whereYear('created_at', substr($datereq, 3, 4))->get();
                // parsing data
                $datacsv = array();
                foreach($users as $user){
                    foreach($absens as $absent){
                        if($user->id_karyawan == $absent->id_karyawan){
                            $jabatan = '';
                            if($user->id_jabatan == 1){
                                $jabatan = 'Direktur';
                            }else if($user->id_jabatan == 2){
                                $jabatan = 'Manager';
                            }else if($user->id_jabatan == 3){
                                $jabatan = 'Staff';
                            }
                            // push data ke array
                            array_push($datacsv, array(
                                'NIK' => $user->nik,
                                'Name' => $user->nama,
                                'Email' => $user->email,
                                'Department' => $jabatan,
                                'Date & Time' => $absent->created_at->format('d-m-Y H:i:s'),
                            ));                            
                        }
                    }
                }
                // proses export csv
                $dateformat = date('d-m-Y ');
                $filename = $datereq ."Absent " .$dateformat.".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('NIK', 'Name', 'Email', 'Department', 'Date & Time'));

                foreach($datacsv as $row) {
                    fputcsv($handle, array($row['NIK'], $row['Name'], $row['Email'], $row['Department'], $row['Date & Time']));
                }

                fclose($handle);

                $headers = array(
                    'Content-Type' => 'text/csv',
                );

                $download =  response()->download($filename, $filename, $headers);

                //delete file after download
                $download->deleteFileAfterSend(true);

                return $download;
            }else{
                // parsing data
                $datacsv = array();                
                foreach($users as $user){
                    foreach($absens as $absent){
                        if($user->id_karyawan == $absent->id_karyawan){
                            $jabatan = '';
                            if($user->id_jabatan == 1){
                                $jabatan = 'Direktur';
                            }else if($user->id_jabatan == 2){
                                $jabatan = 'Manager';
                            }else if($user->id_jabatan == 3){
                                $jabatan = 'Staff';
                            }
                            // push data ke array
                            array_push($datacsv, array(
                                'NIK' => $user->nik,
                                'Name' => $user->nama,
                                'Email' => $user->email,
                                'Department' => $jabatan,
                                'Date & Time' => $absent->created_at->format('d-m-Y H:i:s'),
                            ));                            
                        }
                    }
                }
                // proses export csv
                $dateformat = date('d-m-Y');
                $filename = $datereq ." Absent " .$dateformat.".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('NIK', 'Name', 'Email', 'Department', 'Date & Time'));

                foreach($datacsv as $row) {
                    fputcsv($handle, array($row['NIK'], $row['Name'], $row['Email'], $row['Department'], $row['Date & Time']));
                }

                fclose($handle);

                $headers = array(
                    'Content-Type' => 'text/csv',
                );

                $download =  response()->download($filename, $filename, $headers);

                //delete file after download
                $download->deleteFileAfterSend(true);

                return $download;
                
                
            }
        }else{
            return redirect('/absent-management')->with('error', 'Sorry, Data Absents is Empty');
        }
    }
}
