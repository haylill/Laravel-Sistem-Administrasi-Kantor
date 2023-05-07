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
        return view('dash.inventaris', ['title' => 'Inventaris | Office Administration'])->with('inventaris', $inventaris);
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
        return redirect('inventaris')->with('flash_message', 'Input Addedd!');  
    }

    // menghapus data user
    public function hapus($id)
    {
        $data=inventaris::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
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
}
