@extends('layouts.layoutuser')
@section('contentuser')
<section class="inner-page">
    <div class="container table-responsive">
        <a href="/pengaduanku" class="btn btn-warning btn-md"> Kembali</a>
        <hr>
        <p>
        <div class="row">
            <div class="col-md-8">
                <div class="form form-group">
                    <label for="textJudulPengaduan">Judul Pengaduan</label>
                    <input type="text" class="form form-control" id="textJudulPengaduan">
                </div>
                <div class="form form-group mt-3">
                    <label for="selectKategoriPengaduan">Kategori Pengaduan</label>
                    <select type="text" class="form form-control" id="selectKategoriPengaduan">
                        <option value="">-- Pilih Kategori Pengaduan --</option>
                        <option value="Pencemaran">Pencemaran</option>
                        <option value="Pelecehan">Pelecehan</option>
                        <option value="Kekerasan">Kekerasan</option>
                    </select>
                </div>
                <div class="form form-group mt-3">
                    <label for="textIsiPengaduan">Isi Pengaduan</label>
                    <textarea name="textIsiPengaduan" class="form form-control" id="" cols="30"
                        rows="10"></textarea>
                </div>
                <div class="form form-group mt-3">
                    <label for="filePengaduan">Lampiran Foto Pengaduan</label> <br>
                    <input type="file" name="filePengaduan" id="filePengaduan" class="form form-control"
                        accept="image">
                </div>
                <div class="form form-group mt-3">
                    <a href="user-pengaduanku.html" class="btn btn-success btn-md"> Simpan</a>
                </div>
            </div>
        </div>
        </p>
    </div>
</section>
@endsection