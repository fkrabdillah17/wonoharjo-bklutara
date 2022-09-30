@extends('layouts.user.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <div class="card my-2 shadow" style="width: 830px;">
            <img src="{{ asset('assets/img/news/' . $data->thumbnail) }}" class="card-img-top" alt="Thumbnail"
                height="400px">
            <div class="card-body">
                <h5 class="card-title">{{ $data->title }}</h5>
                <p class="card-text">
                    <small class="text-muted">
                        {{ $data->updated_at->format('d-m-Y') }} - {{ $data->author }} - @if ($data->tag == 'Prestasi')
                            <i class="bi bi-bookmark-dash-fill" style="color: rgb(28, 192, 28)">{{ $data->tag }}</i>
                        @else
                            @if ($data->tag == 'Pengumuman')
                                <i class="bi bi-bookmark-dash-fill" style="color: rgb(47, 72, 218)">{{ $data->tag }}</i>
                            @else
                                <i class="bi bi-bookmark-dash-fill" style="color: black">{{ $data->tag }}</i>
                            @endif
                        @endif
                    </small>
                </p>
                <p class="card-text">{!! $data->content !!}</p>
            </div>
        </div>
    </div>
@endsection
