<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_penduduk extends Model
{
    use HasFactory;
    protected $table = 'm_penduduk';
    protected $guarded = [];

    public function User(){
        // return $this->hasOne('App\Models\User');
        return $this->hasOne(User::class);
    }
}
