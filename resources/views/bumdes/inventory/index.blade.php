@extends('layouts.bumdes.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Inventaris Bumdes</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="d-flex justify-content-between">
        <a href="{{ route('create-inventory') }}" type="button" class="btn btn-primary mb-3">Tambah Data</a>
        <a href="{{ route('print-inventory') }}" type="button" target="_blank" class="btn btn-warning mb-3">Cetak Data <i
                class="bi bi-printer"></i></a>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Inventaris</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-0 text-center px-1"></th>
                            <th class="col-3">Sumber</th>
                            <th class="col-3">Nama</th>
                            <th class="col-1">Jumlah</th>
                            <th class="col-2">Kondisi</th>
                            <th class="col-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventory as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->source }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->condition }}</td>
                                <td class="text-center">
                                    <a href="{{ route('show-inventory', $item->id) }}" type="button"
                                        class="btn btn-primary my-1 rounded" data-toggle="tooltip" data-placement="top"
                                        title="Detail Data"><i class="fas fa-info-circle"></i></a>
                                    <a href="{{ route('edit-inventory', $item->id) }}" type="button"
                                        class="btn btn-success my-1 rounded " data-toggle="tooltip" data-placement="top"
                                        title="Edit Data"><i class="fas fa-edit"></i></a>
                                    @if (auth()->user()->role == 0)
                                        <form action="{{ route('destroy-inventory', $item->id) }}" class="d-inline"
                                            method="post" onsubmit="return confirm('Apakah Anda Yakin Menghapus Data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger my-1 rounded" data-toggle="tooltip"
                                                data-placement="top" title="Hapus Data"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Page Content --}}
@endsection
