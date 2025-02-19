<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GenerateReportController extends Controller
{
    public function index()
    {
        // Set default values for month and year
        $bulan = now()->format('F');
        $tahun = null;
        $status = '';  // Default to empty string for "ALL" status
        $user = Auth::user();
        return view('pages.admin.generatereport.index', [
            'title'         => 'APM | Generate Report',
            'header'        => 'Generate Report',
            'breadcrumb1'   => 'Generate Report',
            'breadcrumb2'   => 'Index',
            'bulan'         => $bulan,
            'tahun'         => $tahun,
            'status'        => $status,
            'user' => $user
        ]);
    }
    public function periode(Request $request)
    {
        // Get selected month, year, and status from the request
        $bulan = $request->input('selectBulan', now()->format('F'));
        $tahun = $request->input('selectTahun', now()->year);
        $status = $request->input('selectStatus', '');  // Default to empty string if no status selected

        // Define the month mapping
        $monthMapping = [
            'Januari' => 1,
            'Februari' => 2,
            'Maret' => 3,
            'April' => 4,
            'Mei' => 5,
            'Juni' => 6,
            'Juli' => 7,
            'Agustus' => 8,
            'September' => 9,
            'Oktober' => 10,
            'November' => 11,
            'Desember' => 12,
        ];

        // Convert selected month to numeric value
        $monthNumber = $monthMapping[$bulan] ?? Carbon::parse($bulan)->month;

        // Fetch distinct statuses from the Pengaduan model
        $statuses = Pengaduan::distinct()->pluck('status');  // This will return an array of unique statuses

        // Fetch complaints based on selected month, year, and status
        $query = Pengaduan::with(['kategoriPengaduan', 'user'])
            ->whereMonth('created_at', $monthNumber)
            ->whereYear('created_at', $tahun);

        // If a status is selected, filter by status
        if ($status) {
            $query->where('status', $status);
        }

        $pengaduans = $query->get();

        // Check if there are no complaints for the selected period
        $message = $pengaduans->isEmpty() ? "Tidak ada pengaduan untuk bulan $bulan $tahun." : null;

        return view('pages.admin.generatereport.generateperiode', [
            'title'         => 'APM | Generate Report',
            'header'        => 'Generate Report',
            'breadcrumb1'   => 'Generate Report',
            'breadcrumb2'   => 'Periode',
            'bulan'         => $bulan,
            'tahun'         => $tahun,
            'status'        => $status,
            'statuses'      => $statuses,  // Pass the statuses to the view
            'pengaduans'    => $pengaduans,
            'message'       => $message
        ]);
    }
    public function rekap(Request $request)
{
    // Ambil bulan dan tahun dari input form
    $bulan = $request->input('selectBulan', now()->format('F'));
    $tahun = $request->input('selectTahun', now()->year);

    // Mapping bulan dalam Bahasa Indonesia ke angka bulan
    $monthMapping = [
        'Januari' => 1,
        'Februari' => 2,
        'Maret' => 3,
        'April' => 4,
        'Mei' => 5,
        'Juni' => 6,
        'Juli' => 7,
        'Agustus' => 8,
        'September' => 9,
        'Oktober' => 10,
        'November' => 11,
        'Desember' => 12
    ];

    // Mengubah nama bulan menjadi angka bulan
    $monthNumber = $monthMapping[$bulan] ?? now()->month;  // Jika bulan tidak ditemukan, default ke bulan sekarang

    // Ambil data pengaduan berdasarkan kategori, bulan, dan tahun yang dipilih
    $kategoriPengaduan = Pengaduan::with('kategoripengaduan')  // Mengambil relasi kategoripengaduan
        ->select('kategori_id', \DB::raw('count(*) as jumlah_pengaduan'))
        ->groupBy('kategori_id')
        ->whereMonth('created_at', $monthNumber)  // Filter berdasarkan bulan yang dipilih
        ->whereYear('created_at', $tahun)  // Filter berdasarkan tahun yang dipilih
        ->get();

    // Mengatur pesan jika tidak ada pengaduan untuk bulan dan tahun yang dipilih
    $message = $kategoriPengaduan->isEmpty() ? "Tidak ada pengaduan untuk bulan $bulan $tahun." : null;

    // Kirim data ke view
    return view('pages.admin.generatereport.generaterekap', [
        'title'         => 'APM | Generate Report',
        'header'        => 'Generate Report',
        'breadcrumb1'   => 'Generate Report',
        'breadcrumb2'   => 'Rekap',
        'bulan'         => $bulan,  // Kirim bulan ke view
        'tahun'         => $tahun,  // Kirim tahun ke view
        'kategoriPengaduan' => $kategoriPengaduan,
        'message'       => $message  // Kirim pesan ke view
    ]);
}


}
