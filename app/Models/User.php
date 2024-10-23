<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo',
        'instansi_id',
        'penugasan_id', // Kolom untuk relasi ke penugasan
        'mentor_id',
        'start_date',
        'end_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define the relationship to the Instansi model.
     */
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id'); // 'instansi_id' adalah foreign key
    }

    /**
     * Define the relationship to the Penugasan model.
     */
    public function penugasan()
    {
        return $this->belongsTo(Penugasan::class, 'penugasan_id'); // 'penugasan_id' adalah foreign key di tabel 'users'
    }

    /**
     * Define the relationship to the Mentor model.
     */
    public function mentor()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id'); // 'mentor_id' adalah foreign key di tabel 'users'
    }
}
