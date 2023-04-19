<?php

namespace App\Http\Controllers;

use App\Models\arsip;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // view inmail
    public function inmail(){
        $user = session()->get('user');
        if($user){
            $data = arsip::where('jenis_surat', 'masuk')->get();
            return view('dash.inmail', ['title' => 'Incoming Mail | Office Administration', 'data' => $data]);
        }else{
            return redirect('/');
        }    
    }

    // addd inmail 
    public function addmail(){
        $url = url()->previous();
        $url = parse_url($url, PHP_URL_PATH);
        $data = [
            'no_surat' => request()->no_surat,
            "tgl_surat" =>  request()->tgl_surat,
            "tgl_diterima" =>  request()->tgl_diterima,
            "dari" =>  request()->dari,
            "kepada" =>  request()->kepada,
            "perihal" =>  request()->perihal,
            "jenis_surat" =>  request()->jenis_surat,
            "lampiran" =>  request()->lampiran,
            "file" =>  request()->file
        ];
        // dd($data);
        // cek format file dari nama file
        $file = $data['file'];

        $ext = $file->getClientOriginalExtension();

        if($ext != 'pdf' && $ext != 'docx' && $ext != 'doc' && $ext != 'png' && $ext != 'jpg' && $ext != 'jpeg' ){
            return redirect($url)->with('error', 'Format Not Supported!');
        }else{
            $file_name = $file->getClientOriginalName();
            $cek_file = arsip::where('file', $file_name)->first();
            if($cek_file){
                return redirect($url)->with('error', 'Name File Already Exist!');
            }else{
                $file->move('file',$data['jenis_surat'].$file->getClientOriginalName());
                $data['file'] = $data['jenis_surat'].$file->getClientOriginalName();
                arsip::create($data);
                return redirect($url)->with('message', 'Mail Added!');
            }
        }
    }

    //update in mail
    public function updateinmail(){
        $url = url()->previous();
        $url = parse_url($url, PHP_URL_PATH);

        $data = [          
            'id' => request()->id,  
            'no_surat' => request()->no_update,
            'tgl_surat' => request()->tglsurat_update,
            'tgl_diterima' => request()->tglterima_update,
            'dari' => request()->dari_update,
            'kepada' => request()->kepada_update,
            'perihal' => request()->perihal_update,
            'lampiran' => request()->lampiran_update,
        ];
        
        $data_arsip = arsip::find(request()->id);
        if($data_arsip['no_surat'] != $data['no_surat'] || $data_arsip['tgl_surat'] != $data['tgl_surat'] || $data_arsip['tgl_diterima'] != $data['tgl_diterima'] || $data_arsip['dari'] != $data['dari'] || $data_arsip['kepada'] != $data['kepada'] || $data_arsip['perihal'] != $data['perihal'] || $data_arsip['lampiran'] != $data['lampiran']){
            arsip::where('id', $data['id'])->update($data);
            return redirect($url)->with('message', 'Mail Updated!');            
        }else{
            return redirect($url)->with('error', 'No Changes!');
        }


    }

    // delete in mail
    public function deleteinmail($id){
        $url = url()->previous();
        $url = parse_url($url, PHP_URL_PATH);

        $data_arsip = arsip::find($id);
        $file = $data_arsip['file'];
        $path = public_path('file/'.$file);
        if(file_exists($path)){
            unlink($path);
            arsip::destroy($id);
            return redirect($url)->with('message', 'Mail Deleted!');
        }else{
            arsip::destroy($id);
            return redirect($url)->with('message', 'Mail Deleted!');            
        }
    }

    //download file
    public function download($file){
        $path = public_path('file/'.$file);
        return response()->download($path);
    }

    // view outmail
    public function outmail(){
        $user = session()->get('user');
        if($user){
            $data = arsip::where('jenis_surat', 'keluar')->get();
            // dd($data);
            return view('dash.outmail', ['title' => 'Outgoing Mail | Office Administration', 'data' => $data]);
        }else{
            return redirect('/');
        }    
    }
}
