<?php

namespace App\Models;

use App\Models\Master\m_layanan;
use App\Models\Master\m_syarat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class syaratPelayanan extends Model
{
    // tidak dipakai
    use HasFactory;
    protected $table = 'syarat_pelayanan';
    protected $guarded = ['id'];

    public function m_layanan():BelongsTo{
        return $this->BelongsTo(m_layanan::class);
    }

    public function m_syarat():HasMany{
        return $this->hasMany(m_syarat::class);
    }
}
