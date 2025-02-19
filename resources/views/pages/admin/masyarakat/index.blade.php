@extends('layouts.layoutadmin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Masyarakat</h3>
                    <a href="/masyarakat/create" class="btn float-right btn-outline-secondary btn-md">
                        <li class="fa fa-plus"></li> Add Data Masyarakat
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
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMasyarakat as $masyarakat)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$masyarakat->nik}}</td>
                                <td>{{$masyarakat->name}}</td>
                                <td>{{$masyarakat->alamat}}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="/masyarakat/{{$masyarakat->id}}/edit" class="btn btn-warning btn-xs" title="Edit Masyarakat">
                                        <li class="fa fa-edit"></li>
                                    </a>
                                    {{-- <!-- Tombol Detail -->
                                     <a href="/masyarakat/{{ $masyarakat->id }}" class="btn btn-primary btn-xs"
                                        title="Detail Masyarakat">
                                        <li class="fa fa-list"></li>
                                    </a> --}}
                                    <!-- Tombol Delete -->
                                    <form action="{{ route('masyarakat.destroy', $masyarakat->id) }}" method="POST"
                                        style="display:inline;" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs"
                                        title="Delete Masyarakat">
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
