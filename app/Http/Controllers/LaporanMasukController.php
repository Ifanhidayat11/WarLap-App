<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;
use Illuminate\Support\Facades\DB;

class LaporanMasukController extends Controller
{
    public function index()
    {
        $kategoriPengaduan = KategoriPengaduan::all();
        $laporan = Pengaduan::with('user')->get();
        $userRole = strtolower(auth()->user()->role);

        $viewPath = $userRole === 'admin' ? 'pages.admin.laporanmasuk.index' : 'pages.petugas.laporanmasuk.index';

        return view($viewPath, [
            'title' => 'APM | Laporan Masuk',
            'header' => 'Laporan Masuk',
            'breadcrumb1' => 'Laporan Masuk',
            'breadcrumb2' => 'Index',
            'kategoriPengaduan' => $kategoriPengaduan,
            'laporan' => $laporan,
        ]);
    }

    public function detail($id)
    {
        $laporan = Pengaduan::find($id);
        $laporan = Pengaduan::with('user')
            ->whereHas('user', function ($query) {
                $query->where('role', 'masyarakat');
            })
            ->find($id);

        if (!$laporan) {
            return redirect()->route('laporanmasuk')->with('error', 'Laporan tidak ditemukan');
        }

        $laporan->tanggalpengaduan = Carbon::parse($laporan->tanggalpengaduan);

        $viewPath = strtolower(auth()->user()->role) === 'admin' ? 'pages.admin.laporanmasuk.detail' : 'pages.petugas.laporanmasuk.detail';

        return view($viewPath, [
            'laporan' => $laporan,
            'title' => 'Detail Laporan Masuk',
            'header' => 'Laporan Masuk',
            'breadcrumb1' => 'Laporan Masuk',
            'breadcrumb2' => 'Detail',
        ]);
    }
    public function getDataLaporan(Request $request)
    {
        try {
            \Log::info('getDataLaporan called', ['request' => $request->all()]);

            $query = DB::table('pengaduan')->leftJoin('users', 'pengaduan.masyarakat_id', '=', 'users.id')->leftJoin('kategoripengaduan', 'pengaduan.kategori_id', '=', 'kategoripengaduan.id')->select('pengaduan.id', 'pengaduan.tanggalpengaduan', 'pengaduan.isipengaduan', 'pengaduan.foto', 'pengaduan.status', 'users.name', 'kategoripengaduan.namakategori');

            $total = $query->count();

            if ($request->input('search.value')) {
                $searchValue = strtolower($request->input('search.value'));
                $query->where(function ($q) use ($searchValue) {
                    $q->whereRaw('LOWER(pengaduan.isipengaduan) LIKE ?', ["%{$searchValue}%"])
                        ->orWhereRaw('LOWER(users.name) LIKE ?', ["%{$searchValue}%"])
                        ->orWhereRaw('LOWER(kategoripengaduan.namakategori) LIKE ?', ["%{$searchValue}%"]);
                });
            }

            $filtered = $query->count();

            // Pagination
            $start = $request->input('start', 0);
            $length = $request->input('length', 10);
            $query->offset($start)->limit($length);

            $data = $query->get();

            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => $total,
                'recordsFiltered' => $filtered,
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error in getDataLaporan: ' . $e->getMessage());
            return response()->json(
                [
                    'error' => 'Failed to fetch data',
                    'message' => $e->getMessage(),
                ],
                500,
            );
        }
    }
    public function updateStatus(Request $request, $id)
    {
        try {
            // Validasi status yang diterima dari form
            $validated = $request->validate([
                'status' => 'required|in:New,Proses,Selesai,Di Tolak',
            ]);

            // Mencari laporan berdasarkan ID
            $laporan = Pengaduan::findOrFail($id);

            // Cek apakah status sudah Selesai
            if ($laporan->status === 'Selesai') {
                return redirect()->route('laporanmasuk')->with('error', 'Laporan yang sudah selesai tidak dapat diupdate lagi!');
            }

            // Update status laporan
            $laporan->status = $request->status;
            $laporan->save();

            // Redirect ke halaman index dengan pesan sukses
            return redirect()
                ->route('laporanmasuk')
                ->with('success', 'Status berhasil diperbarui menjadi ' . $request->status);
        } catch (\Exception $e) {
            return redirect()
                ->route('laporanmasuk')
                ->with('error', 'Gagal mengupdate status: ' . $e->getMessage());
        }
    }
}
