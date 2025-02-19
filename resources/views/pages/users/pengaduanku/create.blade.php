@extends('layouts.layoutuser')

@section('contentuser')
<section class="inner-page">
    <div class="container table-responsive">
        <a href="/pengaduanku" class="btn btn-warning btn-md"> Kembali</a>
        <hr>
        
        <div class="row">
            <div class="col-md-8">
                <!-- Menampilkan pesan sukses atau error -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('pengaduanku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Token CSRF untuk melindungi form -->
                    
                    <div class="form form-group">
                        <label for="textJudulPengaduan">Judul Pengaduan</label>
                        <input type="text" class="form form-control" id="textJudulPengaduan" name="judul" required>
                    </div>
                
                    <div class="form form-group mt-3">
                        <label for="selectKategoriPengaduan">Kategori Pengaduan</label>
                        <select class="form form-control" id="selectKategoriPengaduan" name="kategori_id" required>
                            <option value="">-- Pilih Kategori Pengaduan --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->namakategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form form-group mt-3">
                        <label for="tanggalPengaduan">Tanggal Pengaduan</label>
                        <input type="date" class="form form-control" id="tanggalPengaduan" name="tanggalpengaduan" required>
                    </div>
                    <div class="form form-group mt-3">
                        <label for="textIsiPengaduan">Isi Pengaduan</label>
                        <textarea name="isipengaduan" class="form form-control" cols="30" rows="10" required></textarea>
                    </div>
                
                    <div class="form form-group mt-3">
                        <label for="filePengaduan">Lampiran Foto Pengaduan</label><br>
                        <input type="file" name="foto" id="filePengaduan" class="form form-control" accept="image/*">
                    </div>
                
                    <div class="form form-group mt-3">
                        <button type="submit" class="btn btn-success btn-md"> Simpan</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</section>
@endsection
