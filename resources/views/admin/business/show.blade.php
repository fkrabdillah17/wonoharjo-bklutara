@extends('layouts.admin.main')

@section('title', 'Usaha Desa')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Usaha Desa</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 40rem;">
        <img src="{{ asset('assets/img/business/' . $business->thumbnail) }}" class="card-image-top" alt=""
            height="300px">
        <div class="card-header">
            <span class="font-weight-bold mx-auto"> {{ $business->title }}</span>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-sm">
                <thead>
                    <tr>
                        <th class="col-3"></th>
                        <th class="col-1"></th>
                        <th class="col-auto"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Pemilik Usaha</td>
                        <td>:</td>
                        <td>{{ $business->tag }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Usaha</td>
                        <td>:</td>
                        <td>{{ $business->category }}</td>
                    </tr>
                    <tr>
                        <td>Bidang Usaha</td>
                        <td>:</td>
                        <td>{{ $business->field }}</td>
                    </tr>
                    <tr>
                        <td>Nama Usaha</td>
                        <td>:</td>
                        <td>{{ $business->title }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Usaha</td>
                        <td>:</td>
                        <td>{{ $business->address }}</td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-whatsapp"></i>Whatsapp</td>
                        <td>:</td>
                        <td>+62{{ $business->whatsapp }}</td>
                    </tr>
                    @if ($business->instagram != '-')
                        <tr>
                            <td><i class="bi bi-instagram"></i>Instagram</td>
                            <td>:</td>
                            <td><span>@</span>{{ $business->instagram }}</td>
                        </tr>
                    @endif
                    @if ($business->facebook != '-')
                        <tr>
                            <td><i class="bi bi-facebook"></i>Facebook</td>
                            <td>:</td>
                            <td><span>@</span>{{ $business->facebook }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <P>{!! $business->description !!} </P>
        </div>
        <div class="card-footer text--muted mx-auto">
            <p>
                Di Unggah pada {{ $business->created_at->format('d-m-Y') }}
            </p>
            Di Update pada {{ $business->updated_at->format('d-m-Y') }}
        </div>
        <hr>
        <a href="/admin/business" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
