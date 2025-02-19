@extends('layouts.layoutuser')

@section('contentuser')
    <!-- Hero Section -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Suara Anda adalah Perubahan</h1>
                    <h5>Suara Anda, Perubahan Kita – Laporkan, Kami Tindak Lanjuti!</h5>
                    <div class="input-group mb-3">
                        <a href="#pengaduan" class="btn-lapor">Buat Pengaduan</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="/assetsuser/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Wave Section -->
    <div style="position: relative; background: #B7C9F2;">
        <svg style="position: relative; display: block;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff"
                d="M0,128L80,144C160,160,320,192,480,192C640,192,800,160,960,144C1120,128,1280,128,1360,128L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
            </path>
        </svg>
    </div>

    <!-- Form Pengaduan Section -->
    <section id="pengaduan" class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="fw-bold mb-2">Buat Pengaduan</h2>

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

                <form action="{{ route('pengaduanku.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="textJudulPengaduan" class="form-label">Judul Pengaduan</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror"
                            id="textJudulPengaduan" name="judul" value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="selectKategoriPengaduan" class="form-label">Kategori Pengaduan</label>
                        <select class="form-control @error('kategori_id') is-invalid @enderror" id="selectKategoriPengaduan"
                            name="kategori_id" required>
                            <option value="">-- Pilih Kategori Pengaduan --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->namakategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggalPengaduan" class="form-label">Tanggal Pengaduan</label>
                        <input type="date" class="form-control @error('tanggalpengaduan') is-invalid @enderror"
                            id="tanggalPengaduan" name="tanggalpengaduan" value="{{ old('tanggalpengaduan') }}" required>
                        @error('tanggalpengaduan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="textIsiPengaduan" class="form-label">Isi Pengaduan</label>
                        <textarea name="isipengaduan" class="form-control @error('isipengaduan') is-invalid @enderror" id="textIsiPengaduan"
                            rows="6" required>{{ old('isipengaduan') }}</textarea>
                        @error('isipengaduan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="filePengaduan" class="form-label">Lampiran Foto Pengaduan</label>
                        <input type="file" name="foto" id="filePengaduan"
                            class="form-control @error('foto') is-invalid @enderror" accept="image/*">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-4">Kirim Pengaduan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 mb-3">
                    <h5>Tentang Kami</h5>
                    <p>Aplikasi Pengaduan Masyarakat hadir sebagai solusi inovatif bagi warga untuk menyampaikan keluhan,
                        masukan, dan aspirasi secara cepat, mudah, dan transparan. Dengan sistem yang terintegrasi, kami
                        memastikan setiap laporan yang masuk akan diterima, diproses, dan ditindaklanjuti oleh pihak yang
                        berwenang.</p>
                    <hr>💡 Laporkan, Pantau, dan Bersama Kita Wujudkan Perubahan!
                </div>
                <div class="col-md-6 mb-3">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-map-marker-alt"></i> Jl. Raya Tasikmalaya</p>
                    <p><i class="fas fa-phone"></i> 08823792993</p>
                    <p><i class="fas fa-envelope"></i> info@wanderform.id</p>
                </div>
            </div>
        </div>
    </footer>
@endsection
