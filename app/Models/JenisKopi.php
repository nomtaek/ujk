<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKopi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'asal_daerah',
        'jenis',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
    ];
}
