@extends('layouts.layoutadmin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Laporan Masuk</h3>
                        </div>
                        <div class="card-body">


                            <!-- Detail Laporan -->
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="200">Tanggal Pengaduan</th>
                                            <td>{{ $laporan->tanggalpengaduan->format('d F Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Judul</th>
                                            <td>{{ $laporan->judul }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pengadu</th>
                                            <td>{{ $laporan->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>{{ $laporan->kategoripengaduan->namakategori }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                <span
                                                    class="badge badge-{{ $laporan->status == 'New'
                                                        ? 'info'
                                                        : ($laporan->status == 'Proses'
                                                            ? 'warning'
                                                            : ($laporan->status == 'Selesai'
                                                                ? 'success'
                                                                : 'danger')) }}">
                                                    {{ $laporan->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    @if ($laporan->foto)
                                        <div class="text-center">
                                            <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Pengaduan"
                                                class="img-fluid mb-3" style="max-height: 300px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5>Isi Pengaduan:</h5>
                                    <p class="text-justify">{{ $laporan->isipengaduan }}</p>
                                </div>
                            </div>

                            <!-- Update Status -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Update Status</h5>
                                        </div>
                                        <div class="card-body">
                                            @if ($laporan->status === 'Selesai')
                                                <div class="alert alert-info">
                                                    Laporan ini sudah selesai dan tidak dapat diupdate lagi.
                                                </div>
                                            @else
                                                <form action="{{ route('laporanmasuk.updateStatus', $laporan->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="status">Status Laporan</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="New"
                                                                {{ $laporan->status == 'New' ? 'selected' : '' }}>New
                                                            </option>
                                                            <option value="Proses"
                                                                {{ $laporan->status == 'Proses' ? 'selected' : '' }}>Proses
                                                            </option>
                                                            <option value="Selesai"
                                                                {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>
                                                                Selesai</option>
                                                            <option value="Di Tolak"
                                                                {{ $laporan->status == 'Di Tolak' ? 'selected' : '' }}>Di
                                                                Tolak</option>
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tanggapan -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Tanggapan</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('tanggapan.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="pengaduan_id" value="{{ $laporan->id }}">
                                                <div class="form-group">
                                                    <label for="tanggapan">Tambah Tanggapan</label>
                                                    <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" required></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Kirim Tanggapan</button>
                                            </form>

                                            <hr>

                                            <div class="timeline mt-4">
                                                @forelse($laporan->tanggapan()->orderBy('tanggal_tanggapan', 'desc')->get() as $tanggapan)
                                                    <div class="time-label">
                                                        <span
                                                            class="bg-green">{{ \Carbon\Carbon::parse($tanggapan->tanggal_tanggapan)->format('d M Y') }}</span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-comments bg-blue"></i>
                                                        <div class="timeline-item">
                                                            <span class="time">
                                                                <i class="fas fa-clock"></i>
                                                                {{ \Carbon\Carbon::parse($tanggapan->tanggal_tanggapan)->format('H:i') }}
                                                            </span>
                                                            <h3 class="timeline-header">
                                                                <a href="#">{{ $tanggapan->user->name }}</a>
                                                            </h3>
                                                            <div class="timeline-body">
                                                                {{ $tanggapan->tanggapan }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-muted">Belum ada tanggapan</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <style>
        .timeline {
            margin: 0;
            padding: 0;
            position: relative;
        }

        .time-label {
            margin-bottom: 1rem;
        }

        .timeline-item {
            margin-left: 60px;
            margin-right: 15px;
            margin-bottom: 15px;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 4px;
            position: relative;
        }

        .timeline-header {
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .timeline-body {
            padding-top: 10px;
        }
    </style>
@endsection
