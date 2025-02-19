<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.masyarakat.index', [
            'title' => 'APM | Masyarakat',
            'header' => 'Masyarakat',
            'breadcrumb1' => 'Masyarakat',
            'breadcrumb2' => 'Index',
            'dataMasyarakat' => User::where('role', 'Masyarakat')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.masyarakat.create', [
            'title' => 'APM | Masyarakat',
            'header' => 'Masyarakat',
            'breadcrumb1' => 'Masyarakat',
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
                'textPassword.required' => 'Password wajib diisi',
                'textPassword.min' => 'Password minimal 6 karakter',
            ],
        );
        $dataSimpanMasyarakat = [
            'nik' => $request->textNik,
            'name' => $request->textNama,
            'jeniskelamin' => $request->selectJenisKelamin,
            'notelpon' => $request->textNoTelepon,
            'alamat' => $request->textAlamat,
            'email' => $request->textEmail,
            'password' => bcrypt($request->textPassword),
            'role' => 'Masyarakat',
        ];
        User::create($dataSimpanMasyarakat);
        return redirect('/masyarakat'); // Redirect ke halaman daftar masyarakat setelah penyimpanan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Cek apakah ID valid
        $masyarakat = User::where('id', $id)->where('role', 'Masyarakat')->first();

        if (!$masyarakat) {
            return redirect()->route('masyarakat.index')->with('error', 'Data masyarakat tidak ditemukan!');
        }

        return view('pages.admin.masyarakat.edit', [
            'title' => 'APM | Masyarakat',
            'header' => 'Masyarakat',
            'breadcrumb1' => 'Masyarakat',
            'breadcrumb2' => 'Edit',
            'dataMasyarakat' => $masyarakat,
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi data yang diinput
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

        $user = User::find($id);

        if (!$user) {
            return redirect()->route('masyarakat.index')->with('error', 'Data masyarakat tidak ditemukan!');
        }

        // Update data
        $user->nik = $request->textNik;
        $user->name = $request->textNama;
        $user->jeniskelamin = $request->selectJenisKelamin;
        $user->notelpon = $request->textNoTelepon;
        $user->alamat = $request->textAlamat;
        $user->email = $request->textEmail;

        // Cek apakah password diinputkan
        if ($request->filled('textPassword')) {
            // Validasi konfirmasi password
            if ($request->textPassword === $request->textNewPassword) {
                $user->password = bcrypt($request->textPassword);
            } else {
                return redirect()->back()->with('error', 'Password dan konfirmasi password tidak sama!')->withInput();
            }
        }

        try {
            $user->save();
            return redirect()->route('masyarakat.index')->with('success', 'Data masyarakat berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan! Silahkan coba lagi.')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari masyarakat berdasarkan id
        $masyarakat = User::findOrFail($id);

        // Hapus pengaduan yang terkait dengan masyarakat ini
        $masyarakat->pengaduan()->delete(); // Asumsi bahwa relasi 'pengaduan' sudah didefinisikan di model User

        // Hapus masyarakat
        $masyarakat->delete();

        // Redirect setelah menghapus data
        return redirect()->route('masyarakat.index')->with('success', 'Masyarakat berhasil dihapus!');
    }
}
