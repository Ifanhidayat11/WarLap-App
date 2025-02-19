<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterMasyarakatController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.registermasyarakat');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'textNik' =>'required|unique:users,nik|digits:16',
            'textNama' => 'required',
            'selectJenisKelamin' => 'required',
            'textNomorTelepon' => 'required|digits:13|numeric|unique:users,notelpon',
            'textAlamat' => 'required', 
            'textEmail' => 'required|email|unique:users,email',
            'textPassword' => 'required|min:6',
        ], [
            'textNik.required' => 'NIK wajib diisi.',
            'textNik.unique' => 'NIK sudah terdaftar .',
            'textNik.digits' => 'NIK harus 16 karakter.',
            
            'textNama.required' => 'Nama Lengkap wajib diisi.',
            
            'selectJenisKelamin.required' => 'Jenis Kelamin wajib dipilih.',
            
            'textNomorTelepon.required' => 'Nomor Telepon wajib diisi.',
            'textNomorTelepon.digits' => 'Nomor telepon harus 12 digit.',
            'textNomorTelepon.numeric' => 'Nomor telepon harus berupa angka.',
            'textNomorTelepon.unique' => 'Nomor telepon sudah terdaftar .',
            
            'textAlamat.required' => 'Alamat wajib diisi.',
            
            'textEmail.required' => 'Email wajib diisi.',
            'textEmail.email' => 'Format email tidak valid.',
            'textEmail.unique' => 'Email sudah terdaftar .',
            
            'textPassword.required' => 'Password wajib diisi.',
            'textPassword.min' => 'Password harus minimal 6 karakter.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput()
                           ->with('error', 'Pendaftaran gagal! Periksa kembali data yang diisi.');
        }

        $user = new User();
        $user->nik = $request->textNik;
        $user->name = $request->textNama;
        $user->jeniskelamin = $request->selectJenisKelamin;
        $user->notelpon = $request->textNomorTelepon;
        $user->alamat = $request->textAlamat;
        $user->email = $request->textEmail;
        $user->password = bcrypt($request->textPassword);
        $user->save();
        
        return redirect()->Route('login')->with('success', 'Pendaftaran berhasil!');
    }
}