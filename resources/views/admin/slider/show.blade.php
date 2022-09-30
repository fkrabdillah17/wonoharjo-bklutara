@extends('layouts.admin.main')

@section('title', 'Slider')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Slide</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 30rem;">
        <img src="{{ asset('assets/img/slider/' . $information->file) }}" class="card-image-top" alt="">
        <div class="card-header">
            {{ $information->title }}
        </div>
        <div class="card-footer text--muted mx-auto">
            <p>
                Di Unggah pada {{ $information->created_at->format('d-m-Y') }}
            </p>
            Di Update pada {{ $information->updated_at->format('d-m-Y') }}
        </div>
        <hr>
        <a href="/admin/slider" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
