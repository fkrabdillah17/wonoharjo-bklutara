@extends('layouts.bumdes.main')

@section('content')
    @if (session('sukses'))
        <div class="alert alert-success" id="success-alert" role="alert">
            {{ session('sukses') }}
        </div>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
    </div>

    {{-- Start Page Content --}}
    <div class="text-center">
        <h1>Selamat Datang di Menu Administrator</h1>
        <h2>Sistem Informasi Bumdes</h2>
    </div>
    {{-- End Page Content --}}
@endsection
