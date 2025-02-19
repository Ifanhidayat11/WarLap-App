<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TanggapanController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'pengaduan_id' => 'required|exists:pengaduan,id',
                'tanggapan' => 'required|string'
            ]);

            // Create new tanggapan
            $tanggapan = new Tanggapan();
            $tanggapan->users_id = auth()->id();
            $tanggapan->pengaduan_id = $request->pengaduan_id;
            $tanggapan->tanggal_tanggapan = Carbon::now()->format('Y-m-d');
            $tanggapan->tanggapan = $request->tanggapan;
            $tanggapan->save();

            return redirect()->back()->with('success', 'Tanggapan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan tanggapan: ' . $e->getMessage());
        }
    }
}