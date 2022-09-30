@extends('layouts.admin.main')

@section('title', 'Profil')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Profil Desa Wonoharjo</h1>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        {{-- Start Page Content --}}
        <a href="/admin/profile/create" type="button" class="btn btn-primary mb-3">Tambah Data</a>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Data Profil</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="col-0 text-center px-1"></th>
                                <th class="col-2">Kategori</th>
                                <th class="col-7">Isi</th>
                                <th class="col-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $item)
                                @php
                                    $excerpt = substr($item->content, 0, 100);
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    @if ($item->tag == 'struktur')
                                        <td><img src="{{ asset('assets/img/profile/' . $item->content) }}" width="100px"
                                                height="100px" alt=""></td>
                                    @else
                                        <td>{!! $excerpt !!}</td>
                                    @endif
                                    {{-- <td><img src="{{ asset('img/') }}" width="100px" height="100px" alt=""></td> --}}
                                    <td class="text-center">
                                        <a href="/admin/profile/{{ $item->id }}" type="button"
                                            class="btn btn-primary my-1 rounded" data-toggle="tooltip" data-placement="top"
                                            title="Detail Data"
                                            onsubmit="return confirm('Apakah Anda Yakin Menghapus Data?')"><i
                                                class="fas fa-info-circle"></i></a>
                                        <a href="/admin/profile/{{ $item->id }}/edit" type="button"
                                            class="btn btn-success my-1 rounded " data-toggle="tooltip" data-placement="top"
                                            title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <form action="/admin/profile/{{ $item->id }}" class="d-inline" method="post"
                                            onsubmit="return confirm('Apakah Anda Yakin Menghapus Data?')">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger my-1 rounded" data-toggle="tooltip"
                                                data-placement="top" title="Hapus Data"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
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
