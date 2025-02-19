<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole(Auth::user());
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        // Cek apakah email ada
        $user = \App\Models\User::where('email', $request->email)->first();
        
        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }
    
        // Cek password
        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Password yang Anda masukkan salah.');
        }
    
        $request->session()->regenerate();
        session()->flash('success', 'Berhasil masuk!');
        return $this->redirectBasedOnRole(Auth::user());
    }
    private function redirectBasedOnRole($user)
    {
        switch (strtolower($user->role)) {
            case 'admin':
                return redirect('/dashboard');
            case 'petugas':
                return redirect('/dashboardPetugas');
            case 'masyarakat':
                return redirect('/home');
            default:
                return redirect('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil keluar!');
    }
}