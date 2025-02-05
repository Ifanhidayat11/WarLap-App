@extends('layouts.layoutuser')
@section('contentuser')
<section class="inner-page">
    <div class="container table-responsive">
      <a href="/pengaduanku/create" class="btn btn-success btn-md"> Buat Pengaduan</a>
      <hr>
      <p>
        <table class="table table-responsive table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul Pengaduan</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Limbah Pabrik ABCD</td>
              <td>Pencemaran</td>
              <td>Prosess</td>
              <td><a href="user-detail-pengaduanku.html" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>
          </tbody>
        </table>
      </p>
    </div>
  </section>
@endsection