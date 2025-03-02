<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.loginadmin');
    }

    // Authentication Admin
    public function authadmin(Request $request)
    {
        $dataValidasi = $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return redirect('/loginadmin')->withErrors('Invalid credentials!');
        }
    }
}