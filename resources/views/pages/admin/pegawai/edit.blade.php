@extends('layouts.layoutadmin')

@section('content')
    <section class="content">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // Menampilkan SweetAlert jika ada session success
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    showClass: {
                        popup: 'animate_animated animate_fadeInUp' // animasi muncul
                    },
                    hideClass: {
                        popup: 'animate_animated animate_fadeOutDown' // animasi hilang
                    },
                    timer: 5000 // Waktu notifikasi muncul (dalam milidetik)
                });
            @endif

            // Menampilkan SweetAlert jika ada error
            @if ($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ $errors->first() }}',
                    confirmButtonText: 'OK',
                    showClass: {
                        popup: 'animate_animated animate_fadeInUp'
                    },
                    hideClass: {
                        popup: 'animate_animated animate_fadeOutDown'
                    },
                    timer: 5000
                });
            @endif
        </script>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Edit Data Pegawai</h3>
                        <a href="/pegawai" class="btn float-right btn-outline-warning btn-md">
                            <li class="fa fa-undo"></li> Kembali
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Form Edit Pegawai -->
                        <form action="{{ route('pegawai.update', $dataPegawai->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="card-tabs">
                                        <div class="card-header p-0 pt-1 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-three-home-tab"
                                                        data-toggle="pill" href="#custom-tabs-three-home" role="tab"
                                                        aria-controls="custom-tabs-three-home" aria-selected="true">Detail
                                                        Pegawai</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-three-profile-tab"
                                                        data-toggle="pill" href="#custom-tabs-three-profile" role="tab"
                                                        aria-controls="custom-tabs-three-profile"
                                                        aria-selected="false">Ganti Password</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-three-tabContent">
                                                <!-- Tab Detail Pegawai -->
                                                <div class="tab-pane fade show active" id="custom-tabs-three-home"
                                                    role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="form form-group">
                                                            <label for="textNik">NIK</label>
                                                            <input type="text" name="textNik" id="textNik"
                                                                class="form form-control"
                                                                placeholder="Contoh : 320717XXXXXXX"
                                                                value="{{ old('textNik', $dataPegawai->nik) }}" required>
                                                        </div>

                                                        <div class="form form-group">
                                                            <label for="textNama">Nama</label>
                                                            <input type="text" name="textNama" id="textNama"
                                                                class="form form-control" placeholder="Nama Lengkap"
                                                                value="{{ old('textNama', $dataPegawai->name) }}" required>
                                                        </div>

                                                        <div class="form form-group">
                                                            <label for="selectJenisKelamin">Jenis Kelamin</label>
                                                            <select name="selectJenisKelamin" id="selectJenisKelamin"
                                                                class="form form-control" required>
                                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                                <option value="Laki-laki"
                                                                    {{ strtolower(old('selectJenisKelamin', $dataPegawai->jeniskelamin)) == 'laki-laki' ? 'selected' : '' }}>
                                                                    Laki-laki</option>
                                                                <option value="Perempuan"
                                                                    {{ strtolower(old('selectJenisKelamin', $dataPegawai->jeniskelamin)) == 'perempuan' ? 'selected' : '' }}>
                                                                    Perempuan</option>
                                                            </select>
                                                        </div>


                                                        <div class="form form-group">
                                                            <label for="textNoTelepon">No Telepon</label>
                                                            <input type="text" name="textNoTelepon" id="textNoTelepon"
                                                                class="form form-control" placeholder="Contoh : +6282222777"
                                                                value="{{ old('textNoTelepon', $dataPegawai->notelpon) }}"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="form form-group">
                                                            <label for="textAlamat">Alamat</label>
                                                            <textarea name="textAlamat" id="textAlamat" cols="30" rows="1" class="form form-control"
                                                                placeholder="Alamat Lengkap" required>{{ old('textAlamat', $dataPegawai->alamat) }}</textarea>
                                                        </div>

                                                        <div class="form form-group">
                                                            <label for="selectJabatan">Jabatan</label>
                                                            <select name="selectJabatan" id="selectJabatan"
                                                                class="form form-control" required>
                                                                <option value="">-- Pilih Jabatan --</option>
                                                                <option value="Admin"
                                                                    {{ old('selectJabatan', $dataPegawai->role) == 'Admin' ? 'selected' : '' }}>
                                                                    Admin</option>
                                                                <option value="Petugas"
                                                                    {{ old('selectJabatan', $dataPegawai->role) == 'Petugas' ? 'selected' : '' }}>
                                                                    Petugas</option>
                                                            </select>
                                                        </div>

                                                        <div class="form form-group">
                                                            <label for="textEmail">Email</label>
                                                            <input type="email" name="textEmail" class="form form-control"
                                                                id="textEmail" placeholder="contoh : apm@gmail.com"
                                                                value="{{ old('textEmail', $dataPegawai->email) }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Tab Ganti Password -->
                                                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                                                    aria-labelledby="custom-tabs-three-profile-tab">
                                                    <div class="col-md-6 col-xs-6">
                                                        <div class="form form-group">
                                                            <label for="textPassword">New Password</label>
                                                            <input type="password" name="textPassword"
                                                                class="form form-control" id="textPassword"
                                                                placeholder="Kosongkan jika tidak ingin mengubah password">
                                                        </div>

                                                        <div class="form form-group">
                                                            <label for="textNewPassword">Confirm Password</label>
                                                            <input type="password" name="textNewPassword"
                                                                class="form form-control" id="textNewPassword"
                                                                placeholder="Kosongkan jika tidak ingin mengubah password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button Simpan -->
                                            <div class="col-md-12 col-sm-12">
                                                <button type="submit" class="btn btn-success btn-md">
                                                    <li class="fa fa-save"></li> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
