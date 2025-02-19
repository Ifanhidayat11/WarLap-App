@extends('layouts.layoutadmin')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @php
                    $cards = [
                        [
                            'icon' => 'fas fa-times-circle',
                            'title' => 'Belum ditanggapi',
                            'count' => $belumDitanggapi,
                            'bgColor' => 'bg-gradient-danger',
                            'textColor' => 'text-white',
                        ],
                        [
                            'icon' => 'fas fa-sync-alt',
                            'title' => 'Proses',
                            'count' => $proses,
                            'bgColor' => 'bg-gradient-warning',
                            'textColor' => 'text-white',
                        ],
                        [
                            'icon' => 'fas fa-users',
                            'title' => 'Masyarakat',
                            'count' => $jumlahMasyarakat,
                            'bgColor' => 'bg-gradient-info',
                            'textColor' => 'text-white',
                        ],
                        [
                            'icon' => 'fas fa-check',
                            'title' => 'Selesai',
                            'count' => $selesai,
                            'bgColor' => 'bg-gradient-success',
                            'textColor' => 'text-white',
                        ],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div class="col-12 col-sm-6 col-md-3 mb-4">
                        <div class="card {{ $card['bgColor'] }} shadow h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="{{ $card['textColor'] }} mb-1">{{ $card['title'] }}</h6>
                                        <div class="h4 mb-0 font-weight-bold {{ $card['textColor'] }}">{{ $card['count'] }}
                                        </div>
                                    </div>
                                    <div>
                                        <i class="{{ $card['icon'] }} fa-2x {{ $card['textColor'] }}"
                                            style="opacity: 0.8"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="container mt-4">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Pelapor</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($laporan) && count($laporan) > 0)
                    @foreach ($laporan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggalpengaduan)->translatedFormat('d F Y') }}</td>
                            <td>{{ $item->user->name ?? 'Unknown' }}</td>
                            <td class="text-center">
                                @if ($item->foto)
                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Laporan" class="img-thumbnail"
                                        width="50">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('laporanmasuk.detail', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada laporan masuk</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
