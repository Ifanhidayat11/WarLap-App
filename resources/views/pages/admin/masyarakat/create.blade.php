@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Masyarakat</h3>
                    <a href="/masyarakat" class="btn float-right btn-outline-warning btn-md">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/masyarakat" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form form-group">
                                <label for="textNik">NIK</label>
                                <input type="text" name="textNik" id="textNik" class="form form-control"
                                    placeholder="Contoh : 320717XXXXXXX" value="{{old('textNik')}}">
                                    @error('textNik')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="form form-group">
                                <label for="textNama">Nama</label>
                                <input type="text" name="textNama" id="textNama" class="form form-control"
                                    placeholder="Nama Lengkap" value="{{old('textNama')}}">
                                    @error('textNama')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="form form-group">
                                <label for="selectJenisKelamin">Jenis Kelamin</label>
                                <select name="selectJenisKelamin" id="selectJenisKelamin"
                                    class="form form-control">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form form-group">
                                <label for="textNoTelepon">No Telepon</label>
                                <input type="text" class="form form-control" id="textNoTelepon" name="textNoTelepon" value="{{old('textNoTelepon')}}">
                                @error('textNoTelepon')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form form-group">
                                <label for="textAlamat">Alamat</label>
                                <textarea name="textAlamat" id="textAlamat" cols="30" rows="1"
                                    class="form form-control">{{old('textAlamat')}}</textarea>
                                    @error('textAlamat')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="form form-group">
                                <label for="textEmail">Email</label>
                                <input type="email" name="textEmail" class="form form-control"
                                    id="textEmail" value="{{old('textEmail')}}">
                                    @error('textEmail')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                            <div class="form form-group">
                                <label for="textPassword">Password</label>
                                <input type="password" name="textPassword" class="form form-control"
                                    id="textPassword">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-success btn-md float-right"><li class="fa fa-save"></li> Simpan</button>
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