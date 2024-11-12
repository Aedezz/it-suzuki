<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tentukan nama tabel yang ingin digunakan
    protected $table = 'user'; // Nama tabel yang kamu inginkan

    protected $fillable = [
        'username', 'password', 'nama', 'id_level', 'status', 'created_at', 'created_by',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
