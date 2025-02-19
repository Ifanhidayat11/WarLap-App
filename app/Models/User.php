<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'jeniskelamin',
        'alamat',
        'role',
        'notelpon'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Accessor untuk memeriksa apakah user adalah petugas
    public function getPetugasAttribute()
    {
        return $this->role === 'petugas';
    }

    // Accessor untuk memeriksa apakah user adalah admin
    public function getAdminAttribute()
    {
        return $this->role === 'admin';
    }

    // Accessor untuk memeriksa apakah user adalah masyarakat
    public function getMasyarakatAttribute()
    {
        return $this->role === 'masyarakat';
    }

    // Relasi Ke Table Pengaduan
    public function pengaduan()
    {
        return $this->hasMany('App\Models\Pengaduan', 'masyarakat_id', 'id');
    }

    // Relasi Ke Table Tanggapan
    public function tanggapan()
    {
        return $this->hasMany('App\Models\Tanggapan', 'users_id', 'id');
    }
}
