<?php

namespace App\Http\Controllers;

use App\Models\Master\m_layanan as MasterM_layanan;
use Illuminate\Http\Request;

class m_layanan extends Controller
{

    public function show_data(){
        $menu = 'data-layanan';

        $data = MasterM_layanan::all();
        return view('master.data_layanan.m_layanan', compact(['data','menu']));
    }

    public function tambah_layanan(){
        $menu = 'data-layanan';
        return view('master.data_layanan.tambah_layanan', compact(['menu']));
    }

    public function simpan_layanan(Request $request){
        // dd($request);
        $this->validate($request, [
            'nama_layanan' => 'required',
            'status_layanan' => 'required',
        ]);

        $data = new MasterM_layanan;
        $data->nama_layanan = $request->nama_layanan;
        $data->status_layanan = $request->status_layanan;
        $data->save();

        return redirect('/data-layanan')->with('sukses','Data berhasil di Simpan.');
    }

    public function edit_layanan(MasterM_layanan $layanan){
        $menu = 'data-layanan';
        // dd($layanan->nama_layanan);
        return view('master.data_layanan.edit_layanan',compact(['layanan','menu']));
    }

    public function update_layanan(Request $request, MasterM_layanan $layanan){
        $this->validate($request, [
            'nama_layanan' => 'required',
            'status_layanan' => 'required',
        ]);

        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'status_layanan' => $request->status_layanan,
        ]);

        $layanan->update();

        return redirect('/data-layanan')->with('update','Data Berhasil di Update.');
    }

    public function delete_layanan($id){
        $data = MasterM_layanan::find($id);
        $data->delete();

        return redirect('/data-layanan')->with('delete','Data Berhasil di Hapus.');
    }
}
