<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMasyarakatController extends Controller
{
    public function index()
    {
        return view('pages.users.loginmasyarakat');
    }

    public function authmasyarakat(Request $request)
    {
        $dataValidasi = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate(); // Pastikan session di-regenerate
        
            // Debug: Periksa session yang diset
            session()->put('login_success', 'User logged in');
        
            // Ambil user yang baru saja login
            $user = Auth::user();
        
            // Cek apakah role user adalah 'Masyarakat'
            if ($user->role !== 'Masyarakat') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/loginmasyarakat')->withErrors('Hanya pengguna masyarakat yang dapat mengakses halaman ini.');
            }
        
            return redirect('/pengaduanku'); // Coba redirect langsung
        } else {
            return redirect('/loginmasyarakat')->withErrors('Invalid credentials!');
        }
          
    }        
    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token for security
        return redirect('/loginmasyarakat'); // Redirect to the login page
    }
}
