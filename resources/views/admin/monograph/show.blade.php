@extends('layouts.admin.main')

@section('title', 'Monografi')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Monografi Desa</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-header text-center">
            {{ $monograph->category->category }}
        </div>
        <div class="card-body text-center">
            <span class="font-weight-bold">{{ $monograph->sub_category->sub_category }}</span>
            <P>{!! $monograph->content !!} </P>
        </div>
        <div class="card-footer text--muted mx-auto">
            <p>
                Di Unggah pada {{ $monograph->created_at->format('d-m-Y') }}
            </p>
            Di Update pada {{ $monograph->updated_at->format('d-m-Y') }}
        </div>
        <hr>
        <a href="/admin/monograph" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
