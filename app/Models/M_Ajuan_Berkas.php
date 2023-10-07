<?php

namespace App\Models;

use App\Models\Master\m_syarat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Ajuan_Berkas extends Model
{
    use HasFactory;
    protected $table ='berkas_ajuan';
    protected $guarded = [];

    public function ajuan_layanan(){
        return $this->belongsTo(ajuan_layanan::class);
    }

    public function m_syarat(){
        return $this->belongsTo(m_syarat::class);
    }
}
