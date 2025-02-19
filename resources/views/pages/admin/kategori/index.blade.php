@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kategori</h3>
                    <a href="/kategori/create" class="btn float-right btn-outline-secondary btn-md">
                        <li class="fa fa-plus"></li> Add Data Kategori
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kategoriPengaduan as $kategori)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kategori->namakategori}}</td>
                                <td>{{$kategori->deskripsi}}</td>
                                <td>
                                    <a href="/kategori/{{$kategori->id}}/edit" class="btn btn-warning btn-xs" title="Edit Kategori"><li class="fa fa-edit"></li></a>
                                    {{-- <a href="" class="btn btn-primary btn-xs" title="Detail Kategori"><li class="fa fa-list"></li></a> --}}
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs"
                                            title="Delete Kategori">
                                            <li class="fa fa-trash"></li>
                                        </button>
                                    </form>
                                    <script>
                                        function confirmDelete() {
                                            return confirm("Apakah Anda yakin ingin menghapus data masyarakat ini?");
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
