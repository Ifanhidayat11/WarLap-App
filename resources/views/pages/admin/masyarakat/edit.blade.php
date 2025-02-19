@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Data Masyarakat</h3>
                    <a href="/masyarakat" class="btn float-right btn-outline-warning btn-md">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('masyarakat.update', $dataMasyarakat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form form-group">
                                <label for="textNik">NIK</label>
                                <input type="text" name="textNik" id="textNik" class="form form-control"
                                    placeholder="Contoh : 320717XXXXXXX" value="{{$dataMasyarakat->nik}}">
                            </div>
                            <div class="form form-group">
                                <label for="textNama">Nama</label>
                                <input type="text" name="textNama" id="textNama" class="form form-control"
                                    placeholder="Nama Lengkap" value="{{$dataMasyarakat->name}}">
                            </div>
                            <div class="form form-group">
                                <label for="selectJenisKelamin">Jenis Kelamin</label>
                                <select name="selectJenisKelamin" id="selectJenisKelamin"
                                    class="form form-control">
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{ $dataMasyarakat->jeniskelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ $dataMasyarakat->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form form-group">
                                <label for="textNoTelepon">No Telepon</label>
                                <input type="text" class="form form-control" id="textNoTelepon" name="textNoTelepon" value="{{$dataMasyarakat->notelpon}}">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form form-group">
                                <label for="textAlamat">Alamat</label>
                                <textarea name="textAlamat" id="textAlamat" cols="30" rows="1"
                                    class="form form-control">{{$dataMasyarakat->alamat}}</textarea>
                            </div>
                            <div class="form form-group">
                                <label for="textEmail">Email</label>
                                <input type="email" name="textEmail" class="form form-control"
                                    id="textEmail" value="{{$dataMasyarakat->email}}">
                            </div>
                            <div class="form form-group">
                                <label for="textPassword">Password</label>
                                <input type="password" name="textPassword" class="form form-control" id="textPassword" placeholder="Kosongkan jika tidak ingin mengubah password">
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