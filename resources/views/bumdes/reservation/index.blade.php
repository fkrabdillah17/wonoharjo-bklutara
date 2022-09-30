@extends('layouts.bumdes.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Reservasi Penyewaan Tenda</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if (session('gagal'))
        <div class="alert alert-danger">
            {{ session('gagal') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <a href="{{ route('create-reservation') }}" type="button" class="btn btn-primary mb-3">Tambah Data</a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Reservasi Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th class="col-0 text-center px-1"></th>
                            <th class="col-2">Nama</th>
                            <th class="col-1">Telp</th>
                            <th class="col-2">Alamat</th>
                            <th class="col-2">Tanggal Penyewaan</th>
                            <th class="col-1">Status Pembayaran</th>
                            <th class="col-1">Status Penyewaan</th>
                            <th class="col-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            @if ($item->rental_status != 'Selesai')
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->telp }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->start_reservation_date }} - {{ $item->end_reservation_date }}</td>
                                    @if ($item->payment_status != 'Lunas')
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle custom" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    {{ $item->payment_status }}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        onclick="return confirm('Apakah Anda Yakin Pembayaran Sudah Lunas?')"
                                                        href="{{ route('lunas', $item->id) }}">Lunas</a>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{ $item->payment_status }}</td>
                                    @endif
                                    @if ($item->rental_status != 'Selesai')
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle custom" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    {{ $item->rental_status }}
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                        onclick="return confirm('Apakah Anda Yakin Penyewaan Sudah Selesai?')"
                                                        href="{{ route('selesai', $item->id) }}">Selesai</a>
                                                </div>
                                            </div>
                                        </td>
                                    @else
                                        <td>{{ $item->rental_status }}</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ route('show-reservation', $item->id) }}" type="button"
                                            class="btn btn-primary my-1 rounded" data-toggle="tooltip" data-placement="top"
                                            title="Detail Data"><i class="fas fa-info-circle"></i></a>
                                        <a href="{{ route('edit-reservation', $item->id) }}" type="button"
                                            class="btn btn-success my-1 rounded " data-toggle="tooltip" data-placement="top"
                                            title="Edit Data"><i class="fas fa-edit"></i></a>
                                        @if (auth()->user()->role == 0)
                                            <form action="{{ route('destroy-reservation', $item->id) }}" class="d-inline"
                                                method="post"
                                                onsubmit="return confirm('Apakah Anda Yakin Menghapus Data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger my-1 rounded" data-toggle="tooltip"
                                                    data-placement="top" title="Hapus Data"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Page Content --}}
@endsection
