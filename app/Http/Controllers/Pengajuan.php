<?php

namespace App\Http\Controllers;

use App\Models\ajuan_layanan;
use App\Models\M_Ajuan_Berkas;
use App\Models\Master\m_layanan;
use App\Models\Master\m_penduduk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Pengajuan extends Controller
{
    public function indexPengajuan()
    {
        $menu = 'pengajuan-pelayanan';
        // dd(Auth::user()->m_penduduk_id);

        // $data = m_penduduk::find(Auth::user()->m_penduduk_id);
        $data = m_layanan::all();
        return view('pengajuan.index', compact(['menu', 'data']));
    }

    public function isi_berkas(Request $request)
    {
        $request->validate([
            'id_layanan' => 'required',
        ]);

        $menu = 'pengajuan-pelayanan';

        $data_penduduk = m_penduduk::find(Auth::user()->m_penduduk_id);
        $data_layanan = m_layanan::find($request->id_layanan);

        return view('pengajuan.isi_berkas', compact(['menu', 'data_penduduk', 'data_layanan']));
    }

    public function kirim_ajuan(Request $request)
    {
        // test tanggal
        // dd(date('d-m-Y H:i'));
        // test output
        // dd($request->id);
        $data_ajuan = new ajuan_layanan;
        $data_ajuan->m_layanan_id = $request->m_layanan_id;
        $data_ajuan->m_penduduk_id = $request->m_penduduk_id;
        $data_ajuan->tiket = Str::uuid();
        $data_ajuan->status_berkas = 'Pengajuan';
        $data_ajuan->registrasi = date('d-m-Y H:i');
        $data_ajuan->save();

        // dd('berhasil');
        $validasiData = $request->validate([]);

        $data_layanan = m_layanan::find($request->m_layanan_id);
        // dd($data_layanan->m_syarat->id);
        $no = 0;
        foreach ($data_layanan->m_syarat as $item) {
            // dd($request->id[$no++]);
            $validasiData['ajuan_layanan_id'] = $data_ajuan->id;
            // dd($validasiData);
            $validasiData['m_syarat_id'] = $request->id[$no++];
            if ($item->jenis_berkas == 'File') {
                // dd($validasiData['berkas'.$item->id]);
                $validasiData['isi_berkas'] = $request->file('berkas' . $item->id)->store('berkas-ajuan');
            } else {
                $validasiData['isi_berkas'] = $request['berkas' . $item->id];
            }
            // dd($validasiData);
            // $validasiData['id']
            M_Ajuan_Berkas::create($validasiData);
        }
        return redirect('/pengajuan-pelayanan')->with('sukses', 'Data permohonan berhasil di ajukan.');
    }

    public function show_data()
    {
        $menu = 'data-pengajuan';
        $data = ajuan_layanan::all();
        // dd($data);

        return view('pengajuan.data', compact(['menu', 'data']));
    }

    public function download_file($file)
    {
        // dd('berkas-ajuan/'.$file);
        return Storage::download('berkas-ajuan/' . $file);
    }

    public function download_hasil($file){
        return Storage::download('hasil-ajuan/'.$file);
    }

    public function view_file($file)
    {
        // dd($file);
        return view('pengajuan.view', compact(['file']));
    }

    public function detail_ajuan($tiket)
    {
        // dd($tiket);
        $menu = 'data-pengajuan';
        $data = ajuan_layanan::where('tiket',$tiket)->first();
        // dd($data);

        return view('pengajuan.detail_ajuan', compact(['menu','data']));
    }

    public function tahap2(Request $request){
        // dd($request->all());
        $menu = 'data-pengajuan';
        $request->validate([
            'keterangan' => 'required',
        ]);

        $data = ajuan_layanan::where('tiket', $request->tiket)->get();

        $data->toQuery()->update([
            'status_berkas' => 'Backoffice',
            'backoffice' => date('d-m-Y H:i'),
            'keterangan' => $request->keterangan
        ]);
        // return view('pengajuan.tahap2',compact(['menu','data']));
        return redirect('/data-pengajuan')->with('sukses','Proses ke tahap 2 berhasil.');
    }

    public function penetapan(Request $request){
        // dd($request->all());
        $request->validate([
            'hasil_file' => 'required|file|max:1024',
        ]);

        $data = ajuan_layanan::where('tiket',$request->tiket)->get();
        $data->toQuery()->update([
            'status_berkas' => 'Penetapan',
            'penetapan' => date('d-m-Y H:i'),
            'hasil_file' => $request->file('hasil_file')->store('hasil-ajuan'),
        ]);

        return redirect('/data-pengajuan')->with('sukses','Proses penetapan dan upload hasil pengajuan berhasil.');
    }

    public function hapus_ajuan()
    {
        $data = ajuan_layanan::find(8);

        $berkas = DB::table('berkas_ajuan')
            ->where('ajuan_layanan_id', '=', $data->id)
            ->delete();

        // $berkas->delete();

        $data->delete();

        dd('berhasil dihapus');
    }
}
