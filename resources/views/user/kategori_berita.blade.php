@extends('layouts.user.main')

@section('content')
    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <h1 class="text-center">Kategori "{{ $kategori }}"</h1>
        @foreach ($data as $d)
            @php
                $excerpt = substr($d->content, 0, 300);
            @endphp
            <div class="card my-2 shadow" style="width: 830px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/img/news/' . $d->thumbnail) }}" class="img-fluid rounded-start"
                            alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $d->title }}</h5>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{ $d->updated_at->format('d-m-Y') }} - {{ $d->author }} - @if ($d->tag == 'Prestasi')
                                        <i class="bi bi-bookmark-dash-fill"
                                            style="color: rgb(28, 192, 28)">{{ $d->tag }}</i>
                                    @else
                                        @if ($d->tag == 'Pengumuman')
                                            <i class="bi bi-bookmark-dash-fill"
                                                style="color: rgb(47, 72, 218)">{{ $d->tag }}</i>
                                        @else
                                            <i class="bi bi-bookmark-dash-fill" style="color: black">{{ $d->tag }}</i>
                                        @endif
                                    @endif
                                </small>
                            </p>
                            <p class="card-text">{!! $excerpt !!}...</p>
                            <a href="{{ route('show-berita', $d->slug) }}"
                                class="btn btn-primary position-absolute bottom-0 end-0"><i class="bi bi-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $data->onEachSide(1)->links() }}
    </div>
@endsection
