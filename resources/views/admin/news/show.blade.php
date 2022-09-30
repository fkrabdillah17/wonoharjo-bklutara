@extends('layouts.admin.main')

@section('title', 'Berita')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Berita Desa</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 30rem;">
        <img src="{{ asset('assets/img/news/' . $news->thumbnail) }}" class="card-image-top" alt="">
        <i class="bi bi-tag-fill">{{ $news->tag }}</i>
        <div class="card-header">
            {{ $news->title }}
        </div>
        <div class="card-body">
            <P>{!! $news->content !!} </P>
        </div>
        <div class="card-footer text--muted mx-auto">
            <p>Di buat oleh {{ $news->author }}</p>
            <p>Di Unggah pada {{ $news->created_at->format('d-m-Y') }}</p>
            <p>Di Update pada {{ $news->updated_at->format('d-m-Y') }}</p>
        </div>
        <hr>
        <a href="/admin/news" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
