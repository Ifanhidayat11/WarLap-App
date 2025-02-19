@extends('layouts.layoutadmin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Pegawai</h3>
                    <a href="/pegawai" class="btn float-right btn-outline-warning btn-md">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('pegawai.store') }}" method="POST">  <!-- Tambahkan form dengan method POST -->
                        @csrf  <!-- Tambahkan CSRF Token untuk keamanan -->
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form form-group">
                                    <label for="textNik">NIK</label>
                                    <input type="text" name="textNik" id="textNik" class="form form-control" placeholder="Contoh : 320717XXXXXXX" required>
                                </div>
                                <div class="form form-group">
                                    <label for="textNama">Nama</label>
                                    <input type="text" name="textNama" id="textNama" class="form form-control" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="form form-group">
                                    <label for="selectJenisKelamin">Jenis Kelamin</label>
                                    <select name="selectJenisKelamin" id="selectJenisKelamin" class="form form-control" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form form-group">
                                    <label for="textNoTelepon">No Telepon</label>
                                    <input type="text" name="textNoTelepon" id="textNoTelepon" class="form form-control" placeholder="Contoh : +6282222777" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form form-group">
                                    <label for="textAlamat">Alamat</label>
                                    <textarea name="textAlamat" id="textAlamat" cols="30" rows="1" class="form form-control" placeholder="Alamat Lengkap" required></textarea>
                                </div>
                                <div class="form form-group">
                                    <label for="textEmail">Email</label>
                                    <input type="email" name="textEmail" class="form form-control" id="textEmail" placeholder="contoh : apm@gmail.com" required>
                                </div>
                                <div class="form form-group">
                                    <label for="textPassword">Password</label>
                                    <input type="password" name="textPassword" class="form form-control" id="textPassword" required>
                                </div>
                                <div class="form form-group">
                                    <label for="selectJabatan">Jabatan</label>
                                    <select name="selectJabatan" id="selectJabatan" class="form form-control" required>
                                        <option value="">-- Pilih Jabatan --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Petugas">Petugas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-success btn-md float-right">
                                    <li class="fa fa-save"></li> Simpan
                                </button>
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
