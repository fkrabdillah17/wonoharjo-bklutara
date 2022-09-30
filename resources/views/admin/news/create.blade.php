@extends('layouts.admin.main')

@section('title', 'News')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Berita Desa</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="row">
        <a href="/admin/news" type="button" class="btn btn-warning mb-3 mb-auto">Kembali</a>
        <div class="card shadow col-8 mb-4 mx-auto">
            <div class="card-header py-3 text-center">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Berita</h6>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/news" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tag">Kategori</label>
                        <select class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag">
                            <option value="{{ old('tag') }}">{{ old('tag') ? old('tag') : '-Pilihan-' }} </option>
                            <option value="Berita">Berita</option>
                            <option value="Pengumuman">Pengumuman</option>
                            <option value="Prestasi">Prestasi</option>
                        </select>
                        @error('tag')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowTitle">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowContent">
                        <label for="content ">Isi</label>
                        <textarea type="text" class="form-control @error('editor') is-invalid @enderror" id="editor"
                            name="editor"> {{ old('editor') }} </textarea>
                        @error('editor')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowContent">
                        <label for="thumbnail ">Foto</label>
                        <input type="file" class="form-control-file @error('thumbnail') is-invalid @enderror" id="thumbnail"
                            name="thumbnail">
                        @error('thumbnail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
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
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
