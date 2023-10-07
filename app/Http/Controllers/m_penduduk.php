<?php

namespace App\Http\Controllers;

use App\Models\Master\m_penduduk as MasterM_penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class m_penduduk extends Controller
{
    public function test()
    {
        return view('master.m_penduduk');
    }

    public function show_data()
    {
        $menu = 'data_penduduk';

        $data = MasterM_penduduk::all();
        // dd($data);
        return view(
            'master.data_penduduk.m_penduduk',compact(['data','menu'])
        );
    }

    public function tambah_penduduk()
    {
        $menu = 'data_penduduk';
        return view('master.data_penduduk.tambah_penduduk', compact('menu'));
    }

    public function simpan_penduduk(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required|max:16|min:16',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kel' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'kewarganegaraan' => 'required',
            'email' => 'required|email',
        ]);

        $data = new MasterM_penduduk;
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jenis_kel = $request->jenis_kel;
        $data->agama = $request->agama;
        $data->status_nikah = $request->status_nikah;
        $data->kewarganegaraan = $request->kewarganegaraan;
        $data->jalan = $request->jalan;
        $data->dusun = $request->dusun;
        $data->rt = $request->rt;
        $data->rw = $request->rw;
        $data->kelurahan = $request->kelurahan;
        $data->kode_pos = $request->kode_pos;
        $data->telepon = $request->telepon;
        $data->handphone = $request->handphone;
        $data->email = $request->email;
        $data->npwp = $request->npwp;
        $data->pekerjaan = $request->pekerjaan;
        $data->penghasilan = $request->penghasilan;
        $data->save();

        $user = new User;
        $user->m_penduduk_id = $data->id;
        $user->name = $request->nama;
        $user->username = $request->nik;
        $user->role = 'Warga';
        $user->email = $request->email;
        $user->password = bcrypt($request->nik);
        $user->save();

        return redirect("/data_penduduk")->with('sukses', 'Data Berhasil Di input.');
    }

    public function edit_penduduk(MasterM_penduduk $penduduk)
    {
        $menu = 'data_penduduk';
        // dd($penduduk);
        return view('master.data_penduduk.edit_penduduk', compact(['penduduk','menu']));
    }

    public function update_penduduk(Request $request, MasterM_penduduk $penduduk)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required|max:16|min:16',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kel' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'kewarganegaraan' => 'required',
            'email' => 'required|email',
        ]);
        $penduduk->update(
            [
                'nama' => $request->nama,
                'nik' => $request->nik,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'jenis_kel' => $request->jenis_kel,
                'agama' => $request->agama,
                'status_nikah' => $request->status_nikah,
                'kewarganegaraan' => $request->kewarganegaraan,
                'jalan' => $request->jalan,
                'dusun' => $request->dusun,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kelurahan' => $request->kelurahan,
                'kode_pos' => $request->kode_pos,
                'telepon' => $request->telepon,
                'handphone' => $request->handphone,
                'email' => $request->email,
                'npwp' => $request->npwp,
                'pekerjaan' => $request->pekerjaan,
                'penghasilan' => $request->penghasilan,
            ]
        );
        $penduduk->save();
        return redirect('/data_penduduk')->with('update', 'Data Berhasil di Update.');
    }

    public function delete_penduduk($id)
    {
        $data = MasterM_penduduk::find($id);
        $data->delete();

        return redirect('/data_penduduk')->with('delete', 'Data berhasil di Hapus.');
    }

    public function profile(){
        $menu = '';
        $penduduk = MasterM_penduduk::where('id',Auth::user()->m_penduduk_id)->first();

        return view('warga.profil', compact(['menu','penduduk']));
    }

    public function update_password(Request $request){
        // dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        if(!Hash::check($request->current_password, auth()->user()->password)){
            throw ValidationException::withMessages([
                'current_password' => 'Your current password does not match with our record.',
            ]);
        }

        auth()->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/dashboard')->with('sukses','Berhasil mengubah password.');
    }
}
