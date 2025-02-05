@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Laporan Periode
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form form-group">
                            <label for="selectBulan">
                                Pilih Bulan
                            </label>
                            <select name="selectBulan" id="selectBulan" class="form form-control">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form form-group">
                            <label for="selectTahun">Pilih Tahun</label>
                            <select name="selectTahun" id="selectTahun" class="form form-control">
                                <option value="">-- Pilih Tahun --</option>
                                <option value="">2022</option>
                                <option value="">2023</option>
                            </select>
                        </div>
                        <div class="form form-group">
                            <label for="selectStatus">Pilih Status</label>
                            <select name="selectStatus" id="selectStatus" class="form form-control">
                                <option value="">ALL</option>
                                <option value="">Process</option>
                                <option value="">Selesai</option>
                            </select>
                        </div>
                        <div class="form form-group">
                            <a href="/generatereport/periode" class="btn btn-primary btn-lg"><li class="fa fa-print"></li> Cetak </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Laporan Rekap Periode
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form form-group">
                            <label for="selectBulan">
                                Pilih Bulan
                            </label>
                            <select name="selectBulan" id="selectBulan" class="form form-control">
                                <option value="">-- Pilih Bulan --</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                        <div class="form form-group">
                            <label for="selectTahun">Pilih Tahun</label>
                            <select name="selectTahun" id="selectTahun" class="form form-control">
                                <option value="">-- Pilih Tahun --</option>
                                <option value="">2022</option>
                                <option value="">2023</option>
                            </select>
                        </div>
                        <div class="form form-group">
                            <a href="/generatereport/rekap" class="btn btn-primary btn-lg"><li class="fa fa-print"></li> Cetak </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection