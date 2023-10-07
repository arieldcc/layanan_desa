<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_layanan extends Model
{
    use HasFactory;
    protected $table = 'm_layanan';
    protected $guarded = [];

    public function m_syarat(){
        return $this->belongsToMany(m_syarat::class,'syarat_pelayanan')->withTimestamps();
    }

}
