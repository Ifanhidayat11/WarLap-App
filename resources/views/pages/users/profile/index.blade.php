@extends('layouts.layoutuser')

@section('contentuser')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="/assetsuser/img/team/team-1.jpg" alt="avatar" class="rounded-circle img-fluid"
                            style="width: 150px;">
                        <h5 class="my-3">{{ $user->name }}</h5>
                        <p class="text-muted mb-1">{{ $user->email }}</p>
                        <p class="text-muted mb-4">{{ $user->alamat }}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <ul class="nav nav-tabs card-header-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-white" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                    role="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" id="password-tab" data-bs-toggle="tab" href="#password"
                                    role="tab">Ubah Password</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <!-- Profile Tab -->
                            <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                <form action="{{ Route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">NIK</label>
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                    value="{{ old('nik', $user->nik) }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name', $user->name) }}">
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select name="selectJenisKelamin"
                                                    class="form-select @error('selectJenisKelamin') is-invalid @enderror">
                                                    <option value="Laki-laki"
                                                        {{ $user->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                                    </option>
                                                    <option value="Perempuan"
                                                        {{ $user->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                                    </option>
                                                </select>
                                                @error('selectJenisKelamin')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Nomor Telepon</label>
                                                <input type="text"
                                                    class="form-control @error('notelpon') is-invalid @enderror"
                                                    name="notelpon" value="{{ old('notelpon', $user->notelpon) }}">
                                                @error('notelpon')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email', $user->email) }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-3">
                                                <label class="form-label">Alamat</label>
                                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{ old('alamat', $user->alamat) }}</textarea>
                                                @error('alamat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <a href="/home" class="btn btn-outline-secondary me-2">
                                            <i class="fa fa-undo"></i> Kembali
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Password Tab -->
                            <div class="tab-pane fade" id="password" role="tabpanel">
                                <form action="{{ route('update.password') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label class="form-label">Password Baru</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>

                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-key"></i> Update Password
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
@endsection
