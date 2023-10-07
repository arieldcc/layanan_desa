<?php

namespace App\Http\Controllers;

use App\Models\Master\m_syarat as MasterM_syarat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Intervention\Image\Facades\Image as ResizeImage;

class m_syarat extends Controller
{
    public function show_data(){
        $menu = 'data-syarat';
        $data = MasterM_syarat::all();
        return view('master.data_syarat.m_syarat',compact(['data','menu']));
    }

    public function tambah_syarat(){
        $menu = 'data-syarat';
        return view('master.data_syarat.tambah_syarat',compact(['menu']));
    }

    public function simpan_syarat(Request $request){
        // dd($request->all());
        // return $request->file('berkas')->store('contoh-berkas');

        $validasiData = $request->validate([
            'nama_persyaratan' => 'required',
            'jenis_berkas' => 'required',
            'format' => 'required',
            'ukuran' => 'required',
            'status_persyaratan' => 'required',
            'keterangan' => 'required',
            'contoh_berkas' => 'image|mimes:jpeg,png,jpg|file|max:500',
        ]);

        if($request->file('contoh_berkas')){
            $validasiData['contoh_berkas'] = $request->file('contoh_berkas')->store('contoh-berkas');
        }

        MasterM_syarat::create($validasiData);

        // $filename = time().rand(1,200).'.'.$request->berkas->extension();
        // // dd($filename);
        // $request->berkas->move(public_path('uploads/contohBerkas'),$filename);

        // MasterM_syarat::create([
        //     'nama_persyaratan' => $request->nama_syarat,
        //     'status_persyaratan' => $request->status_syarat,
        //     'contoh_berkas' => $filename,
        // ]);

        return redirect('/data-syarat')
            ->with('sukses','Berhasil di Simpan.');
    }

    public function edit_syarat(MasterM_syarat $syarat){
        $menu = 'data-syarat';
        // dd($syarat->nama_persyaratan);
        return view('master.data_syarat.edit_syarat',compact(['syarat','menu']));
    }

    public function update_syarat(Request $request, MasterM_syarat $syarat){
        $validasiData = $request->validate([
            'nama_persyaratan' => 'required',
            'jenis_berkas' => 'required',
            'format' => 'required',
            'ukuran' => 'required',
            'status_persyaratan' => 'required',
            'keterangan' => 'required',
            'contoh_berkas' => 'image|mimes:jpeg,png,jpg|file|max:500',
        ]);
        // dd(get_class_methods(Storage::class));
        if($request->file('contoh_berkas')){
            if($request->oldBerkas){
                Storage::delete($request->oldBerkas);
            }
            $validasiData['contoh_berkas'] = $request->file('contoh_berkas')->store('contoh-berkas');
        }

        $syarat->update($validasiData);
        return redirect('/data-syarat')->with('update','Data berhasil di Update.');
    }

    public function delete_syarat($id){
        $data = MasterM_syarat::find($id);

        if($data->contoh_berkas){
            Storage::delete($data->contoh_berkas);
        }

        $data->delete();

        return redirect('/data-syarat')->with('delete','Data berhasil di Hapus');
    }
}
