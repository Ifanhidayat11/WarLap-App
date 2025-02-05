<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable =['masyarakat_id', 'kategori_id', 'tanggalpengaduan', 'isipengaduan', 'foto', 'status'];
    protected $table ='pengaduan';
    // Nilai Balik Relasi Ke Table KategoriPengaduan
    public function kategoripengaduan()
    {
        return $this->belongsTo('kategoripengaduan', 'kategori_id', 'id');
    }
    // Relasi Ke Tanggapan
    public function tanggapan()
    {
        return $this->hasMany('tanggapan', 'pengaduan_id', 'id');
    }
}
