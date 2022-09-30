@extends('layouts.user.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h1 class="text-center">Galeri Foto</h1>
        <hr>
        <div class="row">
            @foreach ($data as $d)
                <div class="col-12">
                    <div class="card my-2">
                        <img src="{{ asset('assets/img/gallery/' . $d->file) }}" class="card-img-top" alt="..."
                            height="400px">
                        <div class="card-body">
                            <p class="card-text">{!! $d->content !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $data->onEachSide(1)->links() }}
    </div>
@endsection
