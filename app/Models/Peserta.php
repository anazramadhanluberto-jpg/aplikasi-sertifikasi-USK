<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = [
        'skema_id',
        'nik',
        'nama_peserta',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'status_rekomendasi'
    ];

    public function skema() {
        return $this->belongsTo(Skema::class);
    }
}
