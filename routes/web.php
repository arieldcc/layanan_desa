<?php

use App\Http\Controllers\m_layanan;
use App\Http\Controllers\m_penduduk;
use App\Http\Controllers\m_syarat;
use App\Http\Controllers\m_users;
use App\Http\Controllers\Pengajuan;
use App\Http\Controllers\RiwayatAjuan;
use App\Http\Controllers\SyaratPelayanan;
use App\Models\Master\m_layanan as MasterM_layanan;
use App\Models\Master\m_penduduk as MasterM_penduduk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $menu = 'login';
    return view('/auth/login', compact(['menu']));
});

Route::get('test',[m_penduduk::class,'test']);

Route::middleware(['auth','ceklevel:Admin'])->group(function(){
    Route::controller(m_penduduk::class)->group(function () {
        Route::get('/data_penduduk', 'show_data');
        Route::get('/tambah-penduduk', 'tambah_penduduk');
        Route::post('/simpan-penduduk','simpan_penduduk');
        Route::get('/data_penduduk/{penduduk}/edit','edit_penduduk');
        Route::post('/data_penduduk/{penduduk}/update','update_penduduk');
        Route::get('/data_penduduk/{id}/delete','delete_penduduk');
    });

    Route::controller(m_layanan::class)->group(function(){
        Route::get('/data-layanan', 'show_data');
        Route::get('/tambah-layanan', 'tambah_layanan');
        Route::post('/simpan-layanan', 'simpan_layanan');
        Route::get('/data-layanan/{layanan}/edit', 'edit_layanan');
        Route::post('/data-layanan/{layanan}/update', 'update_layanan');
        Route::get('/data-layanan/{id}/delete', 'delete_layanan');
    });

    Route::controller(m_syarat::class)->group(function(){
        Route::get('data-syarat', 'show_data');
        Route::get('tambah-syarat', 'tambah_syarat');
        Route::post('simpan-syarat', 'simpan_syarat');
        Route::get('data-syarat/{syarat}/edit', 'edit_syarat');
        Route::post('data-syarat/{syarat}/update', 'update_syarat');
        Route::get('data-syarat/{id}/delete', 'delete_syarat');
    });

    Route::controller(SyaratPelayanan::class)->group(function(){
        Route::get('syarat-pelayanan', 'show_data');
        Route::get('syarat-pelayanan/{layanan}/tambah', 'tambah_syarat');
        Route::post('syarat-pelayanan/update', 'update_syarat');
        Route::get('syarat-pelayanan/{id}/delete', 'delete_syarat');
    });

    Route::controller(m_users::class)->group(function(){
        Route::get('/data-user', 'show_data');
        Route::get('/data-user/{user}/reset', 'edit_data');
        Route::post('/data-user/{user}/update', 'update_data');
    });

    Route::controller(Pengajuan::class)->group(function(){
        Route::get('/data-pengajuan','show_data');
        Route::get('/data-pengajuan/berkas-ajuan/{file}/download','download_file');
        Route::get('/data-pengajuan/berkas-ajuan/{file}/view','view_file');
        Route::get('/data-pengajuan/{tiket}/detail-ajuan','detail_ajuan');
        Route::post('/data-pengajuan/tahap2','tahap2');
        Route::post('/data-pengajuan/penetapan','penetapan');
        Route::get('/data-pengajuan/hasil-ajuan/{file}/download','download_hasil');
    });

    // uji coba relasi 3 tabel ralavel [simpan/update, hapus, tampil]
    Route::get('/update', function(){
        $layanan = MasterM_layanan::find(1);
        // dd($layanan->nama_layanan);
        $syarat = ['1','2','3','4'];
        $layanan->m_syarat()->sync($syarat);
        dd('berhasil');
    });

    Route::get('/hapus', function(){
        $layanan = MasterM_layanan::find(1);

        $layanan->m_syarat()->detach();
        dd('berhasil Hapus');
    });

    Route::get('/tampil', function(){
        // $layanan = MasterM_layanan::find(1);
        // dd($layanan->nama_layanan);
        // $syarat = ['1','2','3','4'];
        // $layanan->m_syarat()->sync($syarat);
        // dd('berhasil');
        $data = MasterM_layanan::find(1);
        // dd($data->m_syarat);
        foreach($data->m_syarat as $item){
            dd($item->nama_persyaratan);
        }

    });
});

Route::middleware(['auth','ceklevel:Admin,Warga'])->group(function(){
    Route::get('/dashboard', function () {
        $menu = 'dashboard';
        return view('/dashboard/index', compact(['menu']));
    });

    Route::controller(Pengajuan::class)->group(function(){
        Route::get('/pengajuan-pelayanan','indexPengajuan');
        Route::post('/pengajuan-pelayanan/isi-berkas','isi_berkas');
        Route::post('/pengajuan-pelayanan/kirim-ajuan','kirim_ajuan');
        Route::get('/pengajuan-pelayanan/hapus','hapus_ajuan');
    });

    Route::controller(RiwayatAjuan::class)->group(function(){
        Route::get('/riwayat-pengajuan','data_riwayat');
        Route::get('/riwayat-pengajuan/{tiket}/detail','detail_riwayat');
        Route::get('/riwayat-pengajuan/berkas-ajuan/{file}/view','view_file');
        Route::get('/riwayat-pengajuan/berkas-ajuan/{file}/download','download_file');
        Route::get('/riwayat-pengajuan/hasil-ajuan/{file}/{tiket}/download-hasil','download_hasil');
    });

    Route::get('/profile',[m_penduduk::class,'profile']);
    Route::post('/profile/update-password',[m_penduduk::class,'update_password']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
