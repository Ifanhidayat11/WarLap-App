<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengaduan;
use Carbon\Carbon; // Pastikan Carbon diimpor

class UserPengaduankuController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::where('masyarakat_id', Auth::id())->with('kategoripengaduan')->get();

        // Pass the data to the view
        return view('pages.users.pengaduanku.index', compact('pengaduans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = KategoriPengaduan::all(); // Ambil semua kategori pengaduan
        return view('pages.users.pengaduanku.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = $request->validate(
            [
                'judul' => 'required|string|max:255',
                'kategori_id' => 'required|exists:kategoripengaduan,id',
                'isipengaduan' => 'required|string',
                'foto' => 'required|mimes:jpeg,png,jpg,gif',
                'tanggalpengaduan' => 'required|date',
            ],
            [
                'judul.required' => 'Judul pengaduan harus diisi',
                'kategori_id.required' => 'Kategori pengaduan harus dipilih',
                'isipengaduan.required' => 'Isi pengaduan harus diisi',
                'foto.required' => 'Foto pengaduan harus diunggah',
                'foto.mimes' => 'Format foto harus jpeg, png, jpg, atau gif',
                'tanggalpengaduan.required' => 'Tanggal pengaduan harus diisi',
            ],
        );

        // Menangani upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('pengaduan', 'public');
        }

        // Menyimpan data pengaduan ke database
        Pengaduan::create([
            'masyarakat_id' => Auth::id(), // Menggunakan ID user yang sedang login
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul, // Menyimpan judul yang diterima dari form
            'isipengaduan' => $request->isipengaduan,
            'foto' => $fotoPath,
            'status' => 'New', // Status default 'New'
            'tanggalpengaduan' => $request->tanggalpengaduan, // Menyimpan tanggal pengaduan yang dipilih pengguna
        ]);

        // Redirect ke halaman pengaduanku dengan pesan sukses
        return redirect('/home')->with('success', 'Pengaduan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengaduan = Pengaduan::with([
            'kategoripengaduan',
            'user',
            'tanggapan' => function ($query) {
                $query->orderBy('created_at', 'desc');
            },
        ])->findOrFail($id);
        // Verify that the logged-in user owns this pengaduan
        if ($pengaduan->masyarakat_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        return view('pages.users.pengaduanku.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Function for editing a complaint (can be added later)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Function for updating the complaint (can be added later)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Memeriksa apakah pengguna yang sedang login adalah pemilik pengaduan
        if (Auth::id() != $pengaduan->masyarakat_id) {
            // Perhatikan perubahan di sini
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus pengaduan ini!');
        }

        // Memeriksa status pengaduan (dengan case-insensitive comparison)
        if (strtolower($pengaduan->status) != 'new') {
            // Perhatikan perubahan di sini
            return redirect()->back()->with('error', 'Pengaduan yang sudah diproses tidak dapat dihapus!');
        }

        // Menghapus file foto jika ada
        if ($pengaduan->foto) {
            Storage::delete('public/' . $pengaduan->foto);
        }

        // Menghapus pengaduan
        $pengaduan->delete();

        return redirect()->route('pengaduanku.index')->with('success', 'Pengaduan berhasil dihapus!');
    }
}
