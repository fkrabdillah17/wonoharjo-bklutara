@extends('layouts.admin.main')

@section('title', 'Galeri')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Galeri Desa</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 30rem;">
        @if ($gallery->tag == 'Foto')
            <img src="{{ asset('assets/img/gallery/' . $gallery->file) }}" class="card-image-top" alt="">
        @else
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{ $gallery->file }}" allowfullscreen></iframe>
            </div>
        @endif

        <div class="card-header">
            {{ $gallery->title }}
        </div>
        <div class="card-body">
            <P>{!! $gallery->content !!} </P>
        </div>
        <div class="card-footer text--muted mx-auto">
            <p>
                Di Unggah pada {{ $gallery->created_at->format('d-m-Y') }}
            </p>
            Di Update pada {{ $gallery->updated_at->format('d-m-Y') }}
        </div>
        <hr>
        <a href="/admin/gallery" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
