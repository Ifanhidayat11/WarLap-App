@extends('layouts.layoutadmin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pegawai</h3>
                    <a href="{{ route('pegawai.create') }}" class="btn float-right btn-outline-secondary btn-md">
                        <li class="fa fa-plus"></li> Tambahkan Data Pegawai
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPegawai as $pegawai)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pegawai->nik }}</td>
                                <td>{{ $pegawai->name }}</td>
                                <td>{{ $pegawai->role }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-xs" title="Edit Pegawai">
                                        <li class="fa fa-edit"></li>
                                    </a>
                                    <!-- Tombol untuk menghapus pegawai -->
                                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete Pegawai">
                                            <li class="fa fa-trash"></li>
                                         </button>
                                        </form>
                                        <script>
                                        function confirmDelete() {
                                            return confirm('Apakah Anda yakin ingin menghapus data petugas ini?');
                                        }
                                        </script>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
