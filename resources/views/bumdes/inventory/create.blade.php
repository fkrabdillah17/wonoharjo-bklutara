@extends('layouts.bumdes.main')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Inventaris</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="row">
        <a href="{{ route('inventory') }}" type="button" class="btn btn-warning mb-auto">Kembali</a>
        <div class="card shadow col-8 mb-4 mx-auto">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Barang</h6>
            </div>
            <div class=" card-body">
                <form action="{{ route('store-inventory') }}" method="post" id="inputForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="source">Sumber</label>
                        <input type="text" class="form-control @error('source') is-invalid @enderror" id="source"
                            name="source" value="{{ old('source') }}">
                        @error('source')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="amount">Jumlah</label>
                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount"
                            name="amount" value="{{ old('amount') }}">
                        @error('amount')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="condition">Kondisi</label>
                        <input type="text" class="form-control @error('condition') is-invalid @enderror" id="condition"
                            name="condition" value="{{ old('condition') }}">
                        @error('condition')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowFile">
                        <label for="picture" id="labelIsi">Foto</label>
                        <input type="file" class="form-control-file @error('picture') is-invalid @enderror" id="picture"
                            name="picture" value="{{ old('picture') }}">
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Ukuran Foto Maksimal 2 Mb. Format jpeg,jpg atau png
                        </small>
                        @error('picture')
                            <div id="validationFile" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" id="tombol">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    {{-- End Page Content --}}
@endsection
