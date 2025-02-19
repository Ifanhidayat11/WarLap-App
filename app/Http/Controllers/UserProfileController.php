<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.users.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi data yang diinput
        $request->validate(
            [
                'nik' => 'required|digits:16|unique:users,nik,',
                'name' => 'required',
                'selectJenisKelamin' => 'required',
                'notelpon' => 'required|digits:12',
                'alamat' => 'required',
                'email' => 'required|email|unique:users,email,',
            ],
            [
                'nik.unique' => 'NIK sudah terdaftar',
                'nik.required' => 'NIK wajib diisi',
                'nik.digits' => 'NIK harus 16 karakter',
                'name.required' => 'Nama wajib diisi',
                'selectJenisKelamin.required' => 'Jenis kelamin wajib diisi',
                'notelpon.required' => 'No telepon wajib diisi',
                'notelpon.digits' => 'No telepon harus 12 karakter',
                'alamat.required' => 'Alamat wajib diisi',
                'email.required' => 'Email wajib diisi',
                'email.unique' => 'Email sudah terdaftar',
                'email.email' => 'Format email tidak valid',
            ],
        );

        $user = Auth::user();

        try {
            $user->update([
                'nik' => $request['nik'],
                'name' => $request['name'],
                'jeniskelamin' => $request['selectJenisKelamin'],
                'notelpon' => $request['notelpon'],
                'alamat' => $request['alamat'],
                'email' => $request['email'],
            ]);

            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui profil: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:6',
            ],
            [
                'password.min' => 'Password harus minimal 6 karakter.',
                'password.confirmed' => 'Konfirmasi password tidak cocok.',
            ],
        );

        try {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui password: ' . $e->getMessage());
        }
    }
}
