@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kategori</h3>
                    <a href="/kategori" class="btn float-right btn-outline-warning btn-md">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/kategori/{{$dataKategoriPengaduan->id}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="col-md-6">
                        <div class="form form-group">
                            <label for="textNamaKategori">Nama Kategori</label>
                            <input type="text" name="textNamaKategori" id="textNamaKategori" class="form form-control" value="{{$dataKategoriPengaduan->namakategori}}">
                        </div>
                        <div class="form form-group">
                            <label for="textDeskripsi">Deskripsi</label>
                            <input type="text" name="textDeskripsi" id="textDeskripsi" class="form form-control" value="{{$dataKategoriPengaduan->deskripsi}}">
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <button type="submit" class="btn btn-success btn-md float-left"><li class="fa fa-save"></li> Simpan</button>
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