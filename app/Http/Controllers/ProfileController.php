<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ubah pengecekan role menggunakan strcasecmp() untuk perbandingan case-insensitive
        if ($user->role == 'petugas' || $user->role == 'Petugas') {
            return view('pages.petugas.profile.index', [
                'title' => 'APM | Profile',
                'header' => 'Profile',
                'breadcrumb1' => 'Profile',
                'breadcrumb2' => 'Index',
                'dataUser' => $user,
            ]);
        } elseif ($user->role == 'admin' || $user->role == 'Admin') {
            return view('pages.admin.profile.index', [
                'title' => 'APM | Profile',
                'header' => 'Profile',
                'breadcrumb1' => 'Profile',
                'breadcrumb2' => 'Index',
                'dataUser' => $user,
            ]);
        }
    }

    public function edit()
    {
        $user = auth()->user();

        if ($user->role == 'petugas' || $user->role == 'Petugas') {
            return view('pages.petugas.profile.editprofile', [
                'title' => 'APM | Edit Profile',
                'header' => 'Edit Profile',
                'breadcrumb1' => 'Profile',
                'breadcrumb2' => 'Edit',
                'dataUser' => $user,
            ]);
        } elseif ($user->role == 'admin' || $user->role == 'Admin') {
            return view('pages.admin.profile.editprofile', [
                'title' => 'APM | Edit Profile',
                'header' => 'Edit Profile',
                'breadcrumb1' => 'Profile',
                'breadcrumb2' => 'Edit',
                'dataUser' => $user,
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        // Validasi untuk update data profile
        $request->validate(
            [
                'textNik' => 'required|unique:users,nik',
                'textNama' => 'required',
                'selectJenisKelamin' => 'required',
                'textNoTelepon' => 'required|digits:12',
                'textAlamat' => 'required',
                'textEmail' => 'required|email|unique:users,email',
            ],
            [
                'textNik.unique' => 'NIK sudah terdaftar',
                'textNoTelepon.required' => 'No telepon wajib diisi',
                'textNoTelepon.digits' => 'No telepon harus 12 karakter',
                'textAlamat.required' => 'Alamat wajib diisi',
                'textEmail.required' => 'Email wajib diisi',
                'textEmail.unique' =>  'Email sudah terdaftar',
            ],
        );
        // Pastikan user hanya bisa update profilnya sendiri
        if (auth()->id() != $id) {
            return redirect()->back()->with('error', 'Unauthorized access!');
        }

        // Temukan user berdasarkan id
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'User tidak ditemukan!');
        }

        // Update data selain password
        $user->nik = $request->textNik;
        $user->name = $request->textNama;
        $user->jeniskelamin = $request->selectJenisKelamin;
        $user->notelpon = $request->textNoTelepon;
        $user->alamat = $request->textAlamat;
        $user->email = $request->textEmail;

        // Cek apakah password baru diinputkan dan validasi
        if ($request->filled('textPassword') && $request->textPassword !== '' && $request->textPassword === $request->textNewPassword) {
            $request->validate([
                'textPassword' => 'required|min:6',
                'textNewPassword' => 'required|same:textPassword',
            ]);
            // Update password jika valid
            $user->password = bcrypt($request->textNewPassword);
        }

        // Simpan perubahan data
        $user->save();

        // Redirect sesuai role
        if ($user->role === 'admin') {
            return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil diperbarui!');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('admin.profile.index')->with('success', 'Profile berhasil diperbarui!');
        }
    }
}
