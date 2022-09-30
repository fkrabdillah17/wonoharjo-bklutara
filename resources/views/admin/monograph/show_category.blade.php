@extends('layouts.admin.main')

@section('title', 'Monografi')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Data Kategori Monografi</h1>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Start Page Content --}}
    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-header text-center">
        </div>
        <div class="card-body text-center">
            <table class="table table-sm table-borderless">
                <tbody>
                    <tr>
                        <td class="font-weight-bold">Kategori</td>
                    </tr>
                    <tr>
                        <td> {{ $category->category }} </td>
                        <td>
                            <form action="/admin/monograph-category/{{ $category->id }}" class="d-inline" method="post"
                                onsubmit="return confirm('Apakah Anda Yakin Menghapus Kategori?, Semua data sub kategori akan ikut terhapus')">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger my-1 rounded" data-toggle="tooltip" data-placement="top"
                                    title="Hapus Data"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Sub Kategori</td>
                    </tr>
                    @foreach ($sub_category as $item)
                        @if ($item->category_id == $category->id)
                            <tr>
                                <td>{{ $item->sub_category }}</td>
                                <td>
                                    <form action="/admin/monograph-sub-category/{{ $item->id }}" class="d-inline"
                                        method="post"
                                        onsubmit="return confirm('Apakah Anda Yakin Menghapus sub kategori?')">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger my-1 rounded" data-toggle="tooltip"
                                            data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text--muted mx-auto">
            <p>
                Di Unggah pada {{ $category->created_at->format('d-m-Y') }}
            </p>
            Di Update pada {{ $category->updated_at->format('d-m-Y') }}
        </div>
        <hr>
        <a href="/admin/monograph-category" class="btn btn-warning mx-auto" style="justify-content-center">Kembali</a>
    </div>
    {{-- End Page Content --}}
@endsection
