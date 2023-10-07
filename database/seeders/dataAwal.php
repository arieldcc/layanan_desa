<?php

namespace Database\Seeders;

use App\Models\Master\m_penduduk;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dataAwal extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->truncate();
        // DB::table('m_penduduk')->truncate();

        $data = new m_penduduk;
        $data->nama = "Data Dummy";
        $data->nik = "12345678";
        $data->tempat_lahir = "Gorontalo";
        $data->tgl_lahir = "23-09-2023";
        $data->jenis_kel = "Laki-laki";
        $data->agama = "Islam";
        $data->status_nikah = "Kawin";
        $data->kewarganegaraan = "WNI";
        $data->jalan = "-";
        $data->dusun = "-";
        $data->rt = "001";
        $data->rw = "002";
        $data->kelurahan = "-";
        $data->kode_pos = "12345";
        $data->telepon = "0";
        $data->handphone = "0";
        $data->email = "admin123@gmail.com";
        $data->npwp = "-";
        $data->pekerjaan = "-";
        $data->penghasilan = "-";
        $data->save();

        $user = new User;
        $user->m_penduduk_id = $data->id;
        $user->name = $data->nama;
        $user->username = $data->nik;
        $user->role = 'Admin';
        $user->email = $data->email;
        $user->password = bcrypt($data->nik);
        $user->save();

    }
}
