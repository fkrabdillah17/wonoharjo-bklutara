@extends('layouts.admin.main')

@section('title', 'Profil')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Profil Desa</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card">
        <div class="card-header">
            Detail {{ $profile->title }}
        </div>
        <div class="card-body">
            @if ($profile->tag != 'struktur')
                <P>{!! $profile->content !!}</P>
            @else
                <P class="align-item-center"><img src="{{ asset('assets/img/profile/' . $profile->content) }}"
                        width="100%" height="100%" alt="">
                </P>
            @endif
            <hr>
            <a href="/admin/profile" class="btn btn-warning" style="justify-content-center">Kembali</a>
        </div>
    </div>
    {{-- End Page Content --}}
@endsection
