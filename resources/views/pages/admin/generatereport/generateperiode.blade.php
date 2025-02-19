@extends('layouts.layoutadmin')

@section('content')
<section class="content">
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
                            <li class="fa fa-bars"></li> Jl. Banyu Mengalir No. 123 Jawa Barat KP. 12345 <li class="fa fa-phone"></li> +1 1233456788
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        Laporan Pengaduan Bulan: {{ $bulan }} {{ $tahun }}
                    </div>
                </div>

                <!-- If there are no complaints in the selected month/year -->
                @if ($message)
                <div class="alert alert-warning">{{ $message }}</div>
                @else
                <!-- Display the complaints in a table -->
                <div class="table-responsive mt-3">
                    <table class="table table-bordered table-hover table-report">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Kategori Pengaduan</th>
                                <th>Nama Masyarakat</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduans as $pengaduan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ \Carbon\Carbon::parse($pengaduan->created_at)->format('d F Y') }}</td>
                                <td>{{ $pengaduan->kategoriPengaduan->namakategori }}</td>
                                <td>{{ $pengaduan->user->name }}</td>
                                <td>{{ $pengaduan->status }}</td>
                                <td>
                                    @if($pengaduan->tanggapan->isNotEmpty())
                                    {{ $pengaduan->tanggapan->first()->tanggapan }}
                                    @else
                                    Tidak ada tanggapan
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif

                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        Ciamis, {{ \Carbon\Carbon::now()->format('d F Y') }} <br>
                        {{ ucfirst(auth()->user()->role) }}
                        <br><br><br>
                        </b> {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
