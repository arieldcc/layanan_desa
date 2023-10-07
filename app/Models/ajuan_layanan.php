<?php

namespace App\Models;

use App\Models\Master\m_layanan;
use App\Models\Master\m_penduduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ajuan_layanan extends Model
{
    use HasFactory;
    protected $table = 'ajuan_layanan';
    protected $guarded = [];

    public function m_penduduk(){
        return $this->belongsTo(m_penduduk::class);
    }

    public function m_layanan(){
        return $this->belongsTo(m_layanan::class);
    }

    public function berkas_ajuan(){
        return $this->hasMany(M_Ajuan_Berkas::class);
    }

    // menggunakan uuid
    // jika uuid nya sebagai primarykey menonaktifkan autoincrement
    // public function getIncrementing()
    // {
    //     return false;
    // }

    // memberitahu ke laravel tipe primarykeynya adalah string
    // public function getKeyType()
    // {
    //     return 'string';
    // }

}
