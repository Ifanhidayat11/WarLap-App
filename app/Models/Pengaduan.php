<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $fillable = ['masyarakat_id', 'judul', 'kategori_id', 'tanggalpengaduan', 'isipengaduan', 'foto', 'status'];

    protected $dates = ['tanggalpengaduan'];

    public static function getCountByStatus($status)
    {
        return self::where('status', $status)->count();
    }

    public static function getBelumDitanggapiCount()
    {
        return self::whereDoesntHave('tanggapan')->count();
    }

    public function kategoripengaduan()
    {
        return $this->belongsTo(KategoriPengaduan::class, 'kategori_id', 'id');
    }

    public function tanggapan()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'masyarakat_id', 'id');
    }
}