<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use Illuminate\Http\Request;

class KategoriPengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data kategori dari database
        $kategoriPengaduan = KategoriPengaduan::all();

        // Mengirim data kategori ke view
        return view('pages.admin.kategori.index', [
            'title'        => 'APM | Kategori',
            'header'       => 'Kategori',
            'breadcrumb1'  => 'Kategori',
            'breadcrumb2'  => 'Index',
            'kategoriPengaduan' => $kategoriPengaduan // Mengirim data kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.kategori.create', [
            'title'        => 'APM | Kategori',
            'header'       => 'Kategori',
            'breadcrumb1'  => 'Kategori',
            'breadcrumb2'  => 'Create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'textNamaKategori' => 'required',
            'textDeskripsi' => 'required'
        ]);

        // Menyimpan data kategori ke dalam database
        KategoriPengaduan::create([
            'namakategori' => $request->textNamaKategori,
            'deskripsi' => $request->textDeskripsi
        ]);

        // Mengalihkan ke halaman kategori setelah data berhasil disimpan
        return redirect('/kategori');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data kategori berdasarkan ID
        $kategori = KategoriPengaduan::findOrFail($id);

        return view('pages.admin.kategori.edit', [
            'title'        => 'APM | Kategori',
            'header'       => 'Kategori',
            'breadcrumb1'  => 'Kategori',
            'breadcrumb2'  => 'Edit',
            'dataKategoriPengaduan' => kategoriPengaduan::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'textNamaKategori' => 'required',
            'textDeskripsi' => 'required'
        ]);

        // Menemukan kategori berdasarkan ID
        $kategori = KategoriPengaduan::findOrFail($id);

        // Memperbarui data kategori
        $kategori->update([
            'namakategori' => $request->textNamaKategori,
            'deskripsi' => $request->textDeskripsi
        ]);

        // Mengalihkan ke halaman kategori setelah data berhasil diperbarui
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus kategori berdasarkan ID
        $kategori = KategoriPengaduan::findOrFail($id);
        $kategori->delete();

        // Mengalihkan ke halaman kategori setelah data dihapus
        return redirect('/kategori');
    }
}
