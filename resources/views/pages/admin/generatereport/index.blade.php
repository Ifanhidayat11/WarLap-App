@extends('layouts.layoutadmin')

@section('content')
<section class="content">
    <div class="row">
        <!-- Laporan Periode Form -->
        <div class="col-md-6 col-sm-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Laporan Periode
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('generatereport.periode') }}">
                            @csrf
                            <div class="form form-group">
                                <label for="selectBulan">Pilih Bulan</label>
                                <select name="selectBulan" id="selectBulan" class="form-control">
                                    <option value="">-- Pilih Bulan --</option>
                                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                                    <option value="{{ $month }}" {{ $bulan == $month ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form form-group">
                                <label for="selectTahun">Pilih Tahun</label>
                                <select name="selectTahun" id="selectTahun" class="form-control">
                                    <option value="">-- Pilih Tahun --</option>
                                    @php
                                    $currentYear = date('Y'); // Mendapatkan tahun saat ini
                                    @endphp
                                    <option value="{{ $currentYear }}" {{ $tahun == $currentYear ? 'selected' : '' }}>{{ $currentYear }}</option>
                                    <option value="{{ $currentYear - 1 }}" {{ $tahun == $currentYear - 1 ? 'selected' : '' }}>{{ $currentYear - 1 }}</option>
                                    <option value="{{ $currentYear - 2 }}" {{ $tahun == $currentYear - 2 ? 'selected' : '' }}>{{ $currentYear - 2 }}</option>
                                </select>
                            </div>
                            <div class="form form-group">
                                <label for="selectStatus">Pilih Status</label>
                                <select name="selectStatus" id="selectStatus" class="form-control">
                                    <option value="">ALL</option>
                                    <option value="New" {{ $status == 'New' ? 'selected' : '' }}>New</option>
                                    <option value="Proses" {{ $status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="Selesai" {{ $status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Di Tolak" {{ $status == 'Di Tolak' ? 'selected' : '' }}>DI Tolak</option>
                                </select>
                            </div>
                            <div class="form form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-print"></i> Cetak
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Laporan Rekap Periode Form -->
        <div class="col-md-6 col-sm-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Laporan Rekap Periode
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('generatereport.rekap') }}">
                            @csrf
                            <div class="form form-group">
                                <label for="selectBulanRekap">Pilih Bulan</label>
                                <select name="selectBulan" id="selectBulanRekap" class="form-control">
                                    <option value="">-- Pilih Bulan --</option>
                                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $month)
                                    <option value="{{ $month }}" {{ $bulan == $month ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form form-group">
                                <label for="selectTahunRekap">Pilih Tahun</label>
                                <select name="selectTahun" id="selectTahunRekap" class="form-control">
                                    <option value="">-- Pilih Tahun --</option>
                                    @php
                                    $currentYear = date('Y');
                                    @endphp
                                    <option value="{{ $currentYear }}" {{ $tahun == $currentYear ? 'selected' : '' }}>{{ $currentYear }}</option>
                                    <option value="{{ $currentYear - 1 }}" {{ $tahun == $currentYear - 1 ? 'selected' : '' }}>{{ $currentYear - 1 }}</option>
                                    <option value="{{ $currentYear - 2 }}" {{ $tahun == $currentYear - 2 ? 'selected' : '' }}>{{ $currentYear - 2 }}</option>
                                </select>
                            </div>
                            <div class="form form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-print"></i> Cetak
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
