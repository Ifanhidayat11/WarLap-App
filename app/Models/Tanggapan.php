<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;
    protected $fillable =['users_id', 'pengaduan_id', 'tanggaltanggapan', 'tanggapan'];
    protected $table = 'tanggapan';
    // Nilai Balik  Relasi Ke Pengaduan
    public function pengaduan()
    {
        return $this->belongsTo('pengaduan', 'pengaduan_id', 'id');
    }
    // Niali Balik Relasi Ke Table Users
    public function users()
    {
        return $this->belongsTo('users', 'users_id', 'id');
    }
}
