@extends('layouts.admin.main')

@section('title', 'Tambah Data Monografi')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Monografi</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Monografi</h6>
            </div>
            <div class=" card-body">
                <form action="/admin/monograph" method="post" id="inputForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="sub_category_name"
                            name="category">
                            <option value="{{ old('category') }}">{{ old('category') ? old('category') : '-Pilihan-' }}
                            </option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ ucfirst($item->category) }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sub_category">Sub Kategori</label>
                        <select class="form-control @error('sub_category') is-invalid @enderror" id="sub_category"
                            name="sub_category">
                            <option value="{{ old('sub_category') }}">
                                {{ old('sub_category') ? old('sub_category') : '-Pilihan-' }}
                            </option>
                        </select>
                        @error('sub_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowIsi">
                        <label for="editor" id="labelIsi">Isi Data</label>
                        <textarea class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor"
                            value="{{ old('editor') }}">{{ old('editor') }}</textarea>
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

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#sub_category_name').on('change', function() {
                let id = $(this).val();
                $('#sub_category').empty();
                $('#sub_category').append(
                    `<option value="0" disabled selected>Data Sedang di Proses...</option>`);
                $.ajax({
                    type: 'GET',
                    url: '/Filter/' + id,
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#sub_category').empty();
                        $('#sub_category').append(
                            `<option value="0" disabled selected>-Pilihan-</option>`
                        );
                        response.forEach(element => {
                            $('#sub_category').append(
                                `<option value="${element['id']}">${element['sub_category']}</option>`
                            );
                        });
                    }
                });
            });
        });
    </script>
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
