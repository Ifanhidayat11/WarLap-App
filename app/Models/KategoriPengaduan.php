<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriPengaduan extends Model
{
    use HasFactory;
    protected $fillable =[
        'namakategori', 'deskripsi'
    ];
    protected $table = 'kategoripengaduan';
    // Relasi Ke Table Pengaduan
    public function pengaduan()
    {
        return $this->HasMany('pengaduan', 'kategori_id', 'id');
    }
}
