@extends('layouts.admin.main')

@section('title', 'Ubah Data Galeri')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Data Monografi</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="row">
        <a href="/admin/monograph" type="button" class="btn btn-warning mb-auto">Kembali</a>
        <div class="card shadow col-8 mb-4 mx-auto">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Monografi</h6>
            </div>
            <div class=" card-body">
                <form action="/admin/monograph/{{ $monograph->id }}" method="post" id="inputForm"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category"
                            disabled>
                            <option value="{{ $monograph->category->category }}">{{ $monograph->category->category }}
                            </option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowTitle">
                        <label for="sub_category">Sub Kategori</label>
                        <input type="text" class="form-control  @error('sub_category') is-invalid @enderror"
                            id="sub_category" name="sub_category" value="{{ $monograph->sub_category->sub_category }}"
                            disabled>
                        @error('sub_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowIsi">
                        <label for="editor" id="labelIsi">Isi Data</label>
                        <textarea class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor"
                            value="{{ $monograph->content }}">{{ $monograph->content }}</textarea>
                        @error('editor')
                            <div id="validationEditor" class="invalid-feedback">
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

@section('ck-editor')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
