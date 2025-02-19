@extends('layouts.layoutpetugas')

@section('content')
    <!-- Alert Messages -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Menampilkan SweetAlert jika ada session success
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                showClass: {
                    popup: 'animate_animated animate_fadeInUp' // animasi muncul
                },
                hideClass: {
                    popup: 'animate_animated animate_fadeOutDown' // animasi hilang
                },
                timer: 5000 // Waktu notifikasi muncul (dalam milidetik)
            });
        @endif

        // Menampilkan SweetAlert jika ada error
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ $errors->first() }}',
                confirmButtonText: 'OK',
                showClass: {
                    popup: 'animate_animated animate_fadeInUp'
                },
                hideClass: {
                    popup: 'animate_animated animate_fadeOutDown'
                },
                timer: 5000
            });
        @endif
    </script>
    <div class="container mt-4">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Isi Laporan</th>
                    <th>Foto</th>
                    <th>Pelapor</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($laporan) && count($laporan) > 0)
                    @foreach ($laporan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggalpengaduan)->translatedFormat('d F Y') }}</td>
                            <td>{{ Str::limit($item->isipengaduan, 100) }}</td>
                            <td>
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Laporan" class="img-thumbnail"
                                        width="50">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $item->user->name ?? 'Unknown' }}</td>
                            <td>
                                <span
                                    class="badge {{ strtolower($item->status) === 'new'
                                        ? 'bg-primary'
                                        : (strtolower($item->status) === 'proses'
                                            ? 'bg-warning'
                                            : (strtolower($item->status) === 'selesai'
                                                ? 'bg-success'
                                                : 'bg-secondary')) }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('laporanmasuk.detail', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada laporan masuk</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
