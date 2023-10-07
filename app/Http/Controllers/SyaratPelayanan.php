<?php

namespace App\Http\Controllers;

use App\Models\Master\m_layanan;
use App\Models\Master\m_syarat;
use Illuminate\Http\Request;

class SyaratPelayanan extends Controller
{
    public function show_data()
    {
        $menu = 'syarat-pelayanan';

        $data = m_layanan::all();
        return view('layanan.index', compact(['data', 'menu']));
    }

    public function tambah_syarat(m_layanan $layanan)
    {
        $menu = 'syarat-pelayanan';
        $syarat = m_syarat::all();

        return view('layanan.tambah', compact(['layanan', 'menu', 'syarat']));
    }

    public function update_syarat(Request $request)
    {
        // dd($request->all());
        $syarat_layanan = m_layanan::find($request->m_layanan_id);
        $syarat_layanan->m_syarat()->sync($request->m_syarat_id);

        return redirect('/syarat-pelayanan')->with('sukses', 'Data Persyaratan ' . $syarat_layanan->nama_layanan . ' berhasil di simpan.');
    }

    public function delete_syarat($id)
    {
        $layanan = m_layanan::find($id);

        $layanan->m_syarat()->detach();

        return redirect('/syarat-pelayanan')->with('delete', 'Data Persyaratan ' . $layanan->nama_layanan . ' berhasil di Hapus.');
    }
}
