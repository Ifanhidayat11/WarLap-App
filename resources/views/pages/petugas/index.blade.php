@extends('layouts.layoutpetugas')
@section('contentpetugas') 

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Masyarakat</span>
                        <span class="info-box-number">
                            {{ $jumlahMasyarakat }}
                        </span>
                    </div>                    
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kategori Pengaduan</span>
                        <span class="info-box-number">
                            {{ $jumlahKategoriPengaduan }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-red elevation-1"><i class="fa fa-retweet"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Laporan Pengaduan</span>
                        <span class="info-box-number">
                            {{ $jumlahLaporanPengaduan }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green elevation-1"><i class="fa fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Laporan Baru</span>
                        <span class="info-box-number">
                            {{ $jumlahLaporanBaru }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Laporan Masuk
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tgl Pengaduan</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengaduans as $pengaduan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengaduan->created_at->format('d-m-Y') }}</td>
                                    <td>{{ $pengaduan->judul }}</td>
                                    <td>{{ $pengaduan->kategoripengaduan->namakategori }}</td>
                                    <td>
                                        <a href="/laporanmasuk/detail/{{ $pengaduan->id }}" class="btn btn-primary btn-xs"><li class="fa fa-list"></li> Detail</a>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</section>
@endsection