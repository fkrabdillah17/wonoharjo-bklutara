@extends('layouts.bumdes.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Penyewaan</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-header text-center">
            <span class="font-weight-bold"> Rincian Data Penyewaan</span>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-sm">
                <thead>
                    <tr>
                        <th class="col-5"></th>
                        <th class="col-1"></th>
                        <th class="col-auto"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama Penyewa</td>
                        <td>:</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <td>No. telepon</td>
                        <td>:</td>
                        <td>{{ $data->telp }}</td>
                    </tr>
                    <tr>
                        <td>Lokasi Penyewaan</td>
                        <td>:</td>
                        <td>{{ $data->location }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Penyewaan</td>
                        <td>:</td>
                        <td>{{ $data->start_reservation_date }}</td>
                    </tr>
                    <tr>
                        <td>Paket Penyewaan</td>
                        <td>:</td>
                        <td>{{ $data->end_reservation_date }}</td>
                    </tr>
                    <tr>
                        <td>Harga Penyewaan</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($data->payment, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>Dibuat Oleh</td>
                        <td>:</td>
                        <td>{{ $data->staff }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text--muted mx-auto">
            <p>
                Di Unggah pada {{ $data->created_at->format('d-m-Y') }}
            </p>
            Di Update pada {{ $data->updated_at->format('d-m-Y') }}
        </div>
        <hr>
        <a href="{{ route('rental') }}" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
