@extends('layouts.layoutuser')

@section('contentuser')
<section class="inner-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <a href="/pengaduanku" class="btn btn-warning btn-md">Kembali</a>
                
                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h4>{{ $pengaduan->judul }}</h4>
                                <span class="badge {{ strtolower($pengaduan->status) === 'new' ? 'bg-primary' : 
                                    (strtolower($pengaduan->status) === 'proses' ? 'bg-warning' : 
                                    (strtolower($pengaduan->status) === 'selesai' ? 'bg-success' : 'bg-secondary')) }}">
                                    {{ $pengaduan->status }}
                                </span>
                                <span class="badge bg-secondary">{{ $pengaduan->kategoripengaduan->namakategori }}</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <small class="text-muted">
                                    Dilaporkan pada: {{ \Carbon\Carbon::parse($pengaduan->tanggalpengaduan)->format('d M Y') }}
                                </small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Isi Pengaduan:</h6>
                                <p class="text-justify">{{ $pengaduan->isipengaduan }}</p>
                            </div>
                        </div>

                        @if($pengaduan->foto)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h6>Lampiran Foto:</h6>
                                <img src="{{ asset('storage/' . $pengaduan->foto) }}" 
                                     alt="Foto Pengaduan" 
                                     class="img-fluid mb-3" 
                                     style="max-height: 300px;">
                            </div>
                        </div>
                        @endif

                        <!-- Tanggapan Section -->
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5>Tanggapan</h5>
                                <hr>
                                @if($pengaduan->tanggapan->count() > 0)
                                    @foreach($pengaduan->tanggapan as $tanggapan)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <p class="card-text">{{ $tanggapan->tanggapan }}</p>
                                            <small class="text-muted">
                                                Ditanggapi : {{ $tanggapan->petugas->nama ?? '' }} -
                                                {{ $tanggapan->created_at->format('d M Y H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">Belum ada tanggapan</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Status Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Status
                                <span class="badge {{ strtolower($pengaduan->status) === 'new' ? 'bg-primary' : 
                                    (strtolower($pengaduan->status) === 'proses' ? 'bg-warning' : 
                                    (strtolower($pengaduan->status) === 'selesai' ? 'bg-success' : 'bg-secondary')) }}">
                                    {{ $pengaduan->status }}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Kategori
                                <span class="badge bg-secondary">{{ $pengaduan->kategoripengaduan->namakategori }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tanggal Pengaduan
                                <span>{{ \Carbon\Carbon::parse($pengaduan->tanggalpengaduan)->format('d M Y') }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Pelapor
                                <span>{{ $pengaduan->user->name ?? 'Unknown' }}</span>
                            </li>
                        </ul>
                        
                        <div class="mt-3">
                            @if(strtolower($pengaduan->status) == 'new')
                                <form action="{{ route('pengaduanku.destroy', $pengaduan->id) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus Pengaduan">
                                        <i class="fa fa-trash"></i> Hapus Pengaduan
                                    </button>
                                </form>
                                <script>
                                    function confirmDelete() {
                                        return confirm("Apakah Anda yakin ingin menghapus pengaduan ini?");
                                    }
                                </script>
                            @else
                                <p class="text-muted small mt-3">Pengaduan dengan status '{{ $pengaduan->status }}' tidak dapat dihapus.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection