<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris= inventaris::all();
        $date = $inventaris->pluck('created_at')->map(function($item){
            return $item->format('m-Y');
        })->unique()->toArray();
        return view('dash.inventaris', ['title' => 'Inventaris | Office Administration'])->with(['inventaris' => $inventaris, 'date' => $date]);
    }

    //menyimpan data
    public function input(Request $request)
    {
        $requestData = $request->all();
        inventaris::create([
            'nama' => $request['nama'],
            'jenis'=> $request['jenis'],
            'jumlah'=>$request['jumlah'],
            'tempat'=>($request['tempat']),
            
        ]);
        return redirect('inventaris')->with('message', 'Input Addedd!');  
    }

    // menghapus data user
    public function hapus($id)
    {
        $data=inventaris::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Berhasil Dihapus');
    }
   // menampilkan data inventaris yang mau di update
   public function show($id)
   {
       $data=inventaris::find($id);
    //    return view('dash.update_inventaris',compact('data'));
       return view('dash.update_inventaris', ['title' => 'Inventaris | Office Administration'],compact('data'));
   }
   // menyimpan data inventaris yang telah diupdate
   public function update(Request $request, $id)
   {
        $data=inventaris::find($id);
        $data->nama=$request->get('nama');
        $data->jenis=$request->get('jenis');
        $data->jumlah=$request->get('jumlah');
        $data->tempat=($request->get('tempat'));
        $data->save();
        return redirect()->route('inventaris');
   }

   public function exportinventaris(Request $request){
        $invs = inventaris::all();
        if($invs->count() <1 ){
            return redirect('/inventaris')->with('error', 'Sorry, No data to export!');
        }else{
            $dateraq = $request->date;
            if($dateraq =='all'){
                $datacsv = array();
                foreach($invs as $inv){                    
                    //push data
                    array_push($datacsv, array(                        
                        'Name' => $inv->nama,      
                        'Type' => $inv->jenis,
                        'Count' => $inv->jumlah,
                        'Place' => $inv->tempat,                    
                        'Date & Time' => $inv->created_at->format('d-m-Y')
                    ));                          
                }
                $filename = $dateraq. " Inventaris-".date('d-m-Y').".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('Name', 'Type', 'Count', 'Place','Date & Time'));
                foreach($datacsv as $row) {
                    fputcsv($handle, array ($row['Name'], $row['Type'], $row['Count'], $row['Place'], $row['Date & Time']));
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
                $invdate = inventaris::whereMonth('created_at', substr($dateraq, 0, 2))->whereYear('created_at', substr($dateraq, 3, 4))->get();
                $datacsv = array();
                foreach($invs as $inv){                    
                    //push data
                    array_push($datacsv, array(                        
                        'Name' => $inv->nama,      
                        'Type' => $inv->jenis,
                        'Count' => $inv->jumlah,
                        'Place' => $inv->tempat,                    
                        'Date & Time' => $inv->created_at->format('d-m-Y')
                    ));                          
                }
                $filename = $dateraq. " Inventaris-".date('d-m-Y').".csv";
                $handle = fopen($filename, 'w+');
                fputcsv($handle, array('Name', 'Type', 'Count', 'Place','Date & Time'));
                foreach($datacsv as $row) {
                    fputcsv($handle, array ($row['Name'], $row['Type'], $row['Count'], $row['Place'], $row['Date & Time']));
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
