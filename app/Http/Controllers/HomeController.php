<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriPengaduan;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = KategoriPengaduan::all();
        return view('pages.users.home', compact('kategoris'));
    }
}