@extends('layouts.layoutuser')
@section('contentuser')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <img src="/assets/img/team/team-1.jpg" alt="" width="200px" class="img-profile">
            </div>
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Profle</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Ubah
                            Password</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="form form-group col-md-6">
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="textNik"
                                        placeholder="contoh : 320339402340">
                                    <label for="textNik">NIK</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="textNama"
                                        placeholder="Nama Lengkap">
                                    <label for="textNama">Nama</label>
                                </div>
                                <div class="form-floating">
                                    <select name="selectJenisKelamin" id="selectJenisKelamin"
                                        class="form-control">
                                        <option value="-- Pilih Jenis Kelamin --">Pilih Jenis Kelamin</option>
                                        <option value="-- Laki-laki --">Laki-laki</option>
                                        <option value="-- Perempuan --">Perempuan</option>
                                    </select>
                                    <label for="selectJenisKelamin">Jenis Kelamin</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" name="textNomorTelepon" class="form-control"
                                        id="textNomorTelepon" placeholder="contoh : +6287898997997">
                                    <label for="textNomorTelepon">Nomor Telepon</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating my-3">
                                    <textarea class="form-control" placeholder="Leave a comment here"
                                        id="textAlamat" style="height: 100px"></textarea>
                                    </textarea>
                                    <label for="textAlamat">Alamat</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="email" class="form-control" id="textEmail"
                                        placeholder="Nama Lengkap">
                                    <label for="textEmail">Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-primary position-relative">Perbaharui</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-floating my-3">
                            <input type="password" name="textPassword" id="textPassword" class="form-control">
                            <label for="textPassword">Password</label>
                        </div>
                        <div class="form-floating my-3">
                            <button class="btn btn-primary btn-md">Perbaharui Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection