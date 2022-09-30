@extends('layouts.user.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h1 class="text-center">Galeri Foto</h1>
        <hr>
        <div class="row mb-3 pt-3">
            @foreach ($data as $d)
                <div class="col-6">
                    <div class="card my-2">
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ $d->file }}" title="YouTube video" allowfullscreen></iframe>
                        </div>
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
