@extends('layouts.admin.main')

@section('title', 'Tambah Data Kategori Monografi')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Monografi</h1>
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
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Kategori Monografi</h6>
            </div>
            <div class=" card-body">
                <form action="/admin/monograph-category" method="post" id="inputForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="options">Pilih Form</label>
                        <select class="form-control @error('options') is-invalid @enderror" id="options" onchange="option()" name="options">
                            <option value="{{ old('options') }}">{{ old('options') ? old('options') : '-Pilihan-' }}
                            </option>
                            <option value="category">Buat Kategori</option>
                            <option value="sub_category">Buat Sub Kategori</option>
                        </select>
                        @error('options')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowTag" style="display: none">
                        <label for="category">Kategori Baru</label>
                        <input type="text" class="form-control  @error('category') is-invalid @enderror" id="category" name="category"
                            value="{{ old('category') }}">
                        </select>
                        @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowTags" style="display: none">
                        <label for="tag">Kategori</label>
                        <select class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" onchange="option_button()">
                            <option value="{{ old('tag') ? old('tag') : '-Pilihan-' }}">
                                {{ old('tag') ? old('tag') : '-Pilihan-' }} </option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category }}</option>
                            @endforeach
                        </select>
                        @error('tag')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group" id="rowSub" style="display: none">
                        <label for="sub_category">Sub Kategori</label>
                        <input type="text" class="form-control  @error('sub_category') is-invalid @enderror" id="sub_category" name="sub_category"
                            value="{{ old('sub_category') }}">
                        @error('sub_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary" id="tombol" style="display: none">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kategori Monografi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1 text-center px-1"></th>
                            <th class="col-5">Kategori</th>
                            <th class="col-5">Sub Kategori</th>
                            <th class="col-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->category }}</td>
                                <td>
                                    @foreach ($sub_categories as $sub_item)
                                        @if ($sub_item->category_id == $item->id)
                                            {{ $sub_item->sub_category }},
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <a href="/admin/monograph-category/{{ $item->id }}" type="button" class="btn btn-primary my-1 rounded"
                                        data-toggle="tooltip" data-placement="top" title="Detail Data"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Page Content --}}
@endsection

@section('javascript')
    <script>
        window.onload = function() {
            let kategori = document.getElementById('options').value;
            if (kategori == "category" || kategori == "sub_category") {
                option();
                option_button();
            }
        }

        function option() {
            let option = document.getElementById('options').value;
            let row_tag = document.getElementById('rowTag');
            let row_tags = document.getElementById('rowTags');
            let row_sub = document.getElementById('rowSub');
            let category = document.getElementById('tag');
            let sub_tag = document.getElementById('sub_category');
            let tag = document.getElementById('category');
            let button = document.getElementById('tombol');
            if (option == "category") {
                button.style.display = "";
                row_tag.style.display = "";
                row_tags.style.display = "none";
                row_sub.style.display = "none";
                sub_tag.disabled = "true";
                category.disabled = "true";
                tag.disabled = "";
            } else if (option == "sub_category") {
                row_tag.style.display = "none";
                row_tags.style.display = "";
                row_sub.style.display = "";
                sub_tag.disabled = "";
                category.disabled = "";
                tag.disabled = "true";
                button.style.display = "none";
            } else {
                row_tags.style.display = "none";
                row_sub.style.display = "none";
                row_tag.style.display = "none";
                button.style.display = "none";
            }
        }

        function option_button() {
            let button = document.getElementById('tombol');
            let category = document.getElementById('tag');
            if (category.value == "-Pilihan-") {
                button.style.display = "none";
            } else {
                button.style.display = "";
            }
        }
    </script>
@endsection
