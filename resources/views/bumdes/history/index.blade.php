@extends('layouts.bumdes.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penyewaan</h1>
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
    <div class="d-flex justify-content-end">
        <form action="{{ route('print-rental') }}" target="_blank" class="form-inline" method="get">
            <div class="form-group mb-2">
                <select class="form-control" aria-label="Default select example" name="bulan">
                    <option selected>Pilih Bulan</option>
                    <option value="0">Semua Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-group mb-2 mx-3">
                <select class="form-control" aria-label="Default select example" name="tahun">
                    <option selected>Pilih Tahun</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning mb-2">Cetak Data<i class="bi bi-printer"></i></button>
        </form>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Penyewaan Barang</h6>
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
                            <th class="col-1">Harga Pembayaran</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            @if ($item->rental_status == 'Selesai')
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->telp }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->start_reservation_date }} - {{ $item->end_reservation_date }}</td>
                                    <td>{{ $item->payment }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('show-rental', $item->id) }}" type="button"
                                            class="btn btn-primary my-1 rounded" data-toggle="tooltip" data-placement="top"
                                            title="Detail Data"><i class="fas fa-info-circle"></i></a>
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
