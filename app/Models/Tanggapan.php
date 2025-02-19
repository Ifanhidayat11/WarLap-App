<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    protected $fillable = [
        'users_id',
        'pengaduan_id',
        'tanggal_tanggapan',
        'tanggapan'
    ];

    protected $casts = [
        'tanggal_tanggapan' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class, 'pengaduan_id');
    }
}