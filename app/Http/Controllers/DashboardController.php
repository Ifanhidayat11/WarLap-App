<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $laporan = Pengaduan::with('user', 'tanggapan')->get();
        return view('pages.admin.dashboard.index', [
            'header' => 'Dashboard',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Dashboard',
            'belumDitanggapi' => Pengaduan::getBelumDitanggapiCount(),
            'proses' => Pengaduan::getCountByStatus('proses'),
            'selesai' => Pengaduan::getCountByStatus('selesai'),
            'jumlahMasyarakat' => User::where('role', 'masyarakat')->count(),
            'laporan' => $laporan
        ]);
    }
    
    public function indexPetugas()
    {
        $laporan = Pengaduan::with('user', 'tanggapan')->get();
        return view('pages.petugas.dashboard.index', [
            'header' => 'Dashboard',
            'breadcrumb1' => 'Home',
            'breadcrumb2' => 'Dashboard',
            'belumDitanggapi' => Pengaduan::getBelumDitanggapiCount(),
            'proses' => Pengaduan::getCountByStatus('proses'),
            'selesai' => Pengaduan::getCountByStatus('selesai'),
            'jumlahMasyarakat' => User::where('role', 'masyarakat')->count(),
            'laporan' => $laporan
        ]);
    }
}