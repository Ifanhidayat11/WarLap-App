@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    NIK : {{ $dataUser->nik }} <!-- Menampilkan NIK -->
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b>{{ $dataUser->name }}</b></h2> <!-- Menampilkan nama dataUser -->
                            <p class="text-muted text-sm"><b>Jenis Kelamin : </b> {{ $dataUser->jeniskelamin }}</p> <!-- Jenis kelamin -->
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-building"></i></span> Alamat : {{ $dataUser->alamat }}</li> <!-- Alamat -->
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-phone"></i></span> Phone : {{ $dataUser->notelpon }}</li> <!-- Telepon -->
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-envelope"></i></span> Email : {{ $dataUser->email }}</li> <!-- Email -->
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-briefcase"></i></span> Jabatan : {{ $dataUser->role }}</li> <!-- Jabatan -->
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="{{ $dataUser->avatar }}" alt="" class="img-circle img-fluid"> <!-- Menampilkan foto profil -->
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> Edit Profile
                        </a>
                        
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
