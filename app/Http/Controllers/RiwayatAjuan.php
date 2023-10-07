<?php

namespace App\Http\Controllers;

use App\Models\ajuan_layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RiwayatAjuan extends Controller
{
    public function data_riwayat(){
        $menu = 'riwayat-pengajuan';

        $data = ajuan_layanan::where('m_penduduk_id',Auth::user()->m_penduduk_id)->get();
        // dd($data);
        return view('warga.data_riwayat',compact(['menu','data']));
    }

    public function detail_riwayat($tiket){
        $menu = 'riwayat-pengajuan';
        // dd($tiket);
        $data = ajuan_layanan::where('tiket',$tiket)->first();
        return view('warga.detail_riwayat',compact(['menu','data']));
    }

    public function view_file($file){
        return view('pengajuan.view', compact(['file']));
    }

    public function download_file($file){
        return Storage::download('berkas-ajuan/' . $file);
    }

    public function download_hasil($file,$tiket){
        // dd($file.' | '.$tiket);

        $data = ajuan_layanan::where('tiket',$tiket)->get();
        $data->toQuery()->update([
            'status_berkas' => 'Diambil',
            'pengambilan' => date('d-m-Y H:i'),
        ]);

        return Storage::download('hasil-ajuan/' . $file);

        // return redirect('/riwayat-pengajuan')->with('sukses','Berkas hasil ajuan berhasil di Ambil.');
    }
}
