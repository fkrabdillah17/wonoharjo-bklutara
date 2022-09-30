@extends('layouts.bumdes.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Barang</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 30rem;">
        <img src="{{ asset('assets/img/inventory/' . $data->picture) }}" class="card-image-top" alt="">
        <div class="card-header text-center">
            <span class="font-weight-bold"> Rincian Data</span>
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
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <td>Sumber Barang</td>
                        <td>:</td>
                        <td>{{ $data->source }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Barang</td>
                        <td>:</td>
                        <td>{{ $data->amount }}</td>
                    </tr>
                    <tr>
                        <td>Kondisi Barang</td>
                        <td>:</td>
                        <td>{{ $data->condition }}</td>
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
        <a href="{{ route('inventory') }}" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
