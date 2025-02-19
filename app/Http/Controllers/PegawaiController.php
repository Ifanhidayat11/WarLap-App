<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPegawai = User::where('role', 'petugas')->get();
        return view('pages.admin.pegawai.index', [
            'title' => 'APM | Pegawai',
            'header' => 'Pegawai',
            'breadcrumb1' => 'Pegawai',
            'breadcrumb2' => 'Index',
            'dataPegawai' => $dataPegawai,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.pegawai.create', [
            'title' => 'APM | Pegawai',
            'header' => 'Pegawai',
            'breadcrumb1' => 'Pegawai',
            'breadcrumb2' => 'Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'textNik' => 'required|unique:users,nik|digits:16',
                'textNama' => 'required',
                'selectJenisKelamin' => 'required',
                'textNoTelepon' => 'required|digits:12',
                'textAlamat' => 'required',
                'textEmail' => 'required|unique:users,email',
                'textPassword' => 'required|min:6',
                'selectJabatan' => 'required',
            ],
            [
                'textNik.unique' => 'NIK sudah terdaftar',
                'textNik.required' => 'NIK wajib diisi',
                'textNik.digits' => 'NIK harus 16 karakter',
                'textNama.required' => 'Nama wajib diisi',
                'selectJenisKelamin.required' => 'Jenis kelamin wajib diisi',
                'textNoTelepon.required' => 'No telepon wajib diisi',
                'textNoTelepon.digits' => 'No telepon harus 12 karakter',
                'textAlamat.required' => 'Alamat wajib diisi',
                'textEmail.required' => 'Email wajib diisi',
                'textEmail.unique' =>  'Email sudah terdaftar',
                'textPassword.required' => 'Password wajib diisi',
                'textPassword.min' => 'Password minimal 6 karakter',
                'selectJabatan.required' => 'Jabatan wajib diisi',
            ],
        );

        // Menggunakan query Eloquent tanpa model
        $pegawai = DB::table('users')->insert([
            'nik' => $request->input('textNik'),
            'name' => $request->input('textNama'),
            'jeniskelamin' => $request->input('selectJenisKelamin'),
            'notelpon' => $request->input('textNoTelepon'),
            'alamat' => $request->input('textAlamat'),
            'email' => $request->input('textEmail'),
            'role' => $request->input('selectJabatan'),
            'password' => bcrypt($request->input('textPassword')),
        ]);
    
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil ditambahkan!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.admin.pegawai.edit', [
            'title' => 'APM | Pegawai',
            'header' => 'Pegawai',
            'breadcrumb1' => 'Pegawai',
            'breadcrumb2' => 'Edit',
            'dataPegawai' => User::findOrFail($id), // Menampilkan data pegawai berdasarkan ID
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi untuk update data pegawai
        $request->validate(
            [
                'textNik' => 'required|digits:16|unique:users,nik,' . $id,
                'textNama' => 'required',
                'selectJenisKelamin' => 'required',
                'textNoTelepon' => 'required|digits:12',
                'textAlamat' => 'required',
                'textEmail' => 'required|email|unique:users,email,' . $id,
                'textPassword' => $request->textPassword ? 'min:6' : '',
            ],
            [
                'textNik.unique' => 'NIK sudah terdaftar',
                'textNik.required' => 'NIK wajib diisi',
                'textNik.digits' => 'NIK harus 16 karakter',
                'textNama.required' => 'Nama wajib diisi',
                'selectJenisKelamin.required' => 'Jenis kelamin wajib diisi',
                'textNoTelepon.required' => 'No telepon wajib diisi',
                'textNoTelepon.digits' => 'No telepon harus 12 karakter',
                'textAlamat.required' => 'Alamat wajib diisi',
                'textEmail.required' => 'Email wajib diisi',
                'textEmail.unique' => 'Email sudah terdaftar',
                'textEmail.email' => 'Format email tidak valid',
                'textPassword.min' => 'Password minimal 6 karakter',
            ],
        );

        // Temukan pegawai berdasarkan id
        $pegawai = User::find($id);
        if (!$pegawai) {
            return redirect()->back()->with('error', 'Pegawai tidak ditemukan!');
        }

        // Update data selain password
        $pegawai->nik = $request->textNik;
        $pegawai->name = $request->textNama;
        $pegawai->jeniskelamin = $request->selectJenisKelamin;
        $pegawai->notelpon = $request->textNoTelepon;
        $pegawai->alamat = $request->textAlamat;
        $pegawai->email = $request->textEmail;

        // Cek apakah password baru diinputkan dan validasi
        if ($request->filled('textPassword') && $request->textPassword !== '' && $request->textPassword === $request->textNewPassword) {
            $request->validate([
                'textPassword' => 'required|min:6', // Minimal password 6 karakter
                'textNewPassword' => 'required|same:textPassword', // Pastikan password baru dan konfirmasi sama
            ]);
            // Update password jika valid
            $pegawai->password = bcrypt($request->textNewPassword);
        }

        // Update jabatan
        $pegawai->role = $request->selectJabatan;

        // Simpan perubahan data
        $pegawai->save();

        return redirect('/pegawai')->with('success', 'Data Pegawai berhasil diperbarui!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari pegawai berdasarkan id
        $pegawai = User::findOrFail($id);

        // Hapus pegawai
        $pegawai->delete();

        // Redirect setelah menghapus data
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!');
    }
}
