<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimWeb extends Model
{
    protected $table = 'timweb';

    protected $fillable = ['nama_tim', 'jumlah_artikel', 'jumlah_kata'];

    // Menambah scope untuk filter artikel yang dibuat hari ini
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', now());
    }
}
