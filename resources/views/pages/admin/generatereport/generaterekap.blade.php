@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="container mt-3">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-secondary btn-md">
                    <li class="fa fa-print"></li> Cetak Laporan
                </button>
                <a href="/generatereport" class="btn btn-warning btn-md float-sm-right">
                    <li class="fa fa-undo"></li> Kembali
                </a>
            </div>
            <div class="card-body report">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="h-report"> APM Masyarakat Seluruh Indonesia </div>
                        <div class="h-report-detail">
                            <li class="fa fa-bars"></li> Jl. Banyu Mengalir No. 123 Jawa Barat KP. 12345
                            <li class="fa fa-phone"></li> +1 1233456788
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        Laporan Pengaduan Bulan : {{ $bulan }} {{ $tahun }}
                    </div>
                </div>
                @if ($message)
                <div class="alert alert-warning">
                    {{ $message }}
                </div>
                @endif
                <div class="container-responsive mt-3">
                    <table class="table table-bordered table-hover table-report">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Pengaduan</th>
                                <th>Jumlah Pengaduan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategoriPengaduan as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->kategoripengaduan->namakategori }}</td> <!-- Menampilkan nama kategori -->
                                <td>{{ $kategori->jumlah_pengaduan }}</td>
                                <td>{{ $kategori->kategoripengaduan->deskripsi }}</td> <!-- Menampilkan deskripsi kategori -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        Ciamis, {{ \Carbon\Carbon::now()->format('F Y') }} <br>
                        {{ ucfirst(auth()->user()->role) }}
                        <br><br><br>
                        <!-- Menampilkan Nama berdasarkan Role -->
                        </b> {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</section>
@endsection
