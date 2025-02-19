<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika request ini mengharuskan login admin
        if ($request->is('dashboard') || $request->is('petugas/*')) {
            return route('loginadmin');  // Redirect ke login admin
        }

        // Jika request ini mengharuskan login masyarakat
        if ($request->is('pengaduanku/*') || $request->is('profileuser') || $request->is('laporanmasuk/*')) {
            return route('login');  // Redirect to the masyarakat login page
        }

        // Default redirect for unauthenticated users, adjust as necessary for your app.
        return route('login'); // Ensure this points to the masyarakat login page.
    }
}
