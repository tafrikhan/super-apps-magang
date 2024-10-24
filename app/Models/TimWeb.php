<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimWeb extends Model
{
    use HasFactory;

    protected $table = 'tim_web';

    protected $fillable = [
        'jumlah_artikel', 
        'jumlah_kata', 
        'keterangan',
        'tanggal',
    ];
}
