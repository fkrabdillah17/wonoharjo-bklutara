@extends('layouts.admin.main')

@section('title', 'Usaha Desa')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Data Usaha Desa</h1>
</div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

{{-- Start Page Content --}}
<div class="row">
    <a href="/admin/business" type="button" class="btn btn-warning mb-3 mb-auto">Kembali</a>
    <div class="card shadow col-8 mb-4 mx-auto">
        <div class="card-header py-3 text-center">
            <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Usaha</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/admin/business/{{ $business->id }}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Kolom yang memiliki tanda <span style="color: red">*</span> wajib di isi!
                </small>
                <hr>
                <div class="form-group">
                    <label for="tag" class="required">Pemilik Usaha</label>
                    <select class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag">
                        <option value="{{ $business->tag }}">{{ old('tag') ? old('tag') : $business->tag }}</option>
                        <option value="Pemerintah">Pemerintah</option>
                        <option value="Swasta">Swasta</option>
                    </select>
                    @error('tag')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category" class="required">Jenis Usaha</label>
                    <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
                        <option value="{{ $business->category }}">
                            {{ old('category') ? old('category') : $business->category }}
                        </option>
                        <option value="Usaha Mikro">Usaha Mikro</option>
                        <option value="Usaha Kecil">Usaha Kecil</option>
                        <option value="Usaha Menengah">Usaha Menengah</option>
                        <option value="Usaha Besar">Usaha Besar</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="field" class="required">Bidang Usaha</label>
                    <select class="form-control @error('field') is-invalid @enderror" id="field" name="field">
                        <option value="{{ $business->field }}">{{ old('field') ? old('field') : $business->field }}
                        </option>
                        <option value="Pertanian">Pertanian</option>
                        <option value="Perkebunan">Perkebunan</option>
                        <option value="Konstruksi">Konstruksi</option>
                        <option value="Jasa Umum">Jasa Umum</option>
                    </select>
                    @error('field')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group" id="rowTitle">
                    <label for="title" class="required">Nama Usaha</label>
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') ? old('title') : $business->title }}">
                    <input type="hidden" name="oldTitle" value="{{ $business->title }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group" id="rowContent">
                    <label for="description" class="required">Deskripsi Usaha</label>
                    <textarea type="text" class="form-control @error('editor') is-invalid @enderror" id="editor"
                        name="editor"> {{ $business->description }} </textarea>
                    @error('editor')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="required">Alamat</label>
                    <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" rows="3"> {{ $business->address }} </textarea>
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Foto Lama Tempat Usaha</label>
                    <img src="{{ asset('assets/img/business/' . $business->thumbnail) }}" width="100%" alt="">
                </div>
                <div class="form-group" id="rowContent">
                    <label for="thumbnail" class="required">Foto Baru Tempat Usaha</label>
                    <input type="file" class="form-control-file @error('thumbnail') is-invalid @enderror" id="thumbnail"
                        name="thumbnail">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Foto bagian depan tempat usaha, Ukuran Maksimal 2 Mb
                    </small>
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="whatsapp" class="required">Whatsapp</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp"
                            value="{{ $business->whatsapp }}" name="whatsapp">
                    </div>
                    @error('whatsapp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <hr>
                <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram"
                            value="{{ $business->instagram }}" name="instagram">
                    </div>
                    @error('instagram')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                            value="{{ $business->facebook }}" name="facebook">
                    </div>
                    @error('facebook')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
            </form>
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
