<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index()
    {
        $tamu= tamu::all();        
        return view('auth.tamu', ['title' => 'Guest Book | Office Administration'])->with('tamu', $tamu);

    }

    public function show()
    {
        $tamu= tamu::all();
        $date = $tamu->pluck('created_at')->map(function($item){
            return $item->format('m-Y');
        })->unique()->toArray();
        return view('dash.tamuu', ['title' => 'Guest Book | Office Administration'])->with(
            [
                'tamu' => $tamu,
                'date' => $date
            ]
        );
    }

    //menyimpan data
    public function input(Request $request)
    {
        // dd($request->all());
        Tamu::create($request->all());
        return redirect('tamu')->with('message', 'Input Addedd!');    
    }

    //export data
    public function exportguest(Request $request){
        $tamus = tamu::all();
        if($tamus->count() <1 ){
            return redirect('/guest')->with('error', 'Sorry, No data to export!');
        }else{
            $datereq = $request->date;
            if($datereq == 'all'){
                $datacsv = array();
                foreach($tamus as $tamu){                    
                    //push data
                    array_push($datacsv, array(                        
                        'Name' => $tamu->nama,      
                        'Email' => $tamu->email,
                        'Phone' => $tamu->telp,
                        'Gender' => $tamu->jenkel,
                        'Address' => $tamu->alamat,    
                        'OBJECTIVE' => $tamu->tujuan,                            
                        'Date & Time' => $tamu->created_at->format('d-m-Y H:i:s')
                    ));                          
                }
                $filename = $datereq. " Guest-".date('d-m-Y').".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('Name', 'Email', 'Phone', 'Gender', 'Address','OBJECTIVE', 'Date & Time'));
                foreach($datacsv as $row) {
                    fputcsv($handle, array ($row['Name'], $row['Email'], $row['Phone'], $row['Gender'], $row['Address'],$row['OBJECTIVE'], $row['Date & Time']));
                }
                fclose($handle);
                $headers = array(
                    'Content-Type' => 'text/csv',
                );
                $download = response()->download($filename, $filename, $headers);
                // delete file
                $download->deleteFileAfterSend(true);
                
                return $download;
            }else{
                $tamudate = tamu::whereMonth('created_at', substr($datereq, 0, 2))->whereYear('created_at', substr($datereq, 3, 4))->get();
                $datacsv = array();
                foreach($tamudate as $tamu){                    
                    //push data
                    array_push($datacsv, array(                        
                        'Name' => $tamu->nama,      
                        'Email' => $tamu->email,
                        'Phone' => $tamu->telp,
                        'Gender' => $tamu->jenkel,
                        'Address' => $tamu->alamat,    
                        'OBJECTIVE' => $tamu->tujuan,                            
                        'Date & Time' => $tamu->created_at->format('d-m-Y H:i:s')
                    ));                        
                }
                $filename = $datereq. " Guest-".date('d-m-Y').".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('Name', 'Email', 'Phone', 'Gender', 'Address','OBJECTIVE', 'Date & Time'));
                foreach($datacsv as $row) {
                    fputcsv($handle, array ($row['Name'], $row['Email'], $row['Phone'], $row['Gender'], $row['Address'],$row['OBJECTIVE'], $row['Date & Time']));
                }
                fclose($handle);
                $headers = array(
                    'Content-Type' => 'text/csv',
                );
                $download = response()->download($filename, $filename, $headers);
                // delete file
                $download->deleteFileAfterSend(true);
                
                return $download;

            }
        }
    }
}
