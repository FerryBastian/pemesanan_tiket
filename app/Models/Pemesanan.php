<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    protected $fillable = [
        'nama_pemesan',
        'nomor_identitas',
        'no_hp',
        'wisata_id',
        'tanggal_kunjungan',
        'jumlah_dewasa',
        'jumlah_anak',
        'total_bayar',
    ];

    public function wisata(): BelongsTo
    {
        return $this->belongsTo(Wisata::class);
    }
}
