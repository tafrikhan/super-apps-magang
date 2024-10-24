<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama',
        'jabatan',
    ];
}
=======
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mentor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'mentor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nik', 
        'jabatan',
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
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}


>>>>>>> 39eeb9c6480f4cc99a004824453ba05693596ffc
