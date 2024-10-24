<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimSosmed extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel bukan jamak dari model)
    protected $table = 'tim_sosmeds';

    // Kolom-kolom yang boleh diisi melalui mass-assignment
    protected $fillable = [
        'pekerjaan_hari_ini',
        'keterangan',
        'tanggal',
    ];

    // Kolom yang otomatis diisi oleh timestamps
    public $timestamps = true;
}
