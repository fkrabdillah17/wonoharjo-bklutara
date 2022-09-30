@extends('layouts.user.main2')

@section('content')
    {{-- Start Carousel --}}
    <div class="container-lg">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                @for ($i = 1; $i < $count; $i++)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $i }}"
                        aria-label="Slide {{ $i + 1 }}"></button>
                @endfor

            </div>
            <div class="carousel-inner">
                @foreach ($slider as $item)
                    @if ($item->title == 'Welcome Slider-Welcome Slide')
                        <div class="carousel-item drk active">
                            <img src="{{ asset('assets/img/slider/' . $item->file) }}" class="d-block w-100 h-100"
                                alt="...">
                            <div class="carousel-caption slide-pertama">
                                <h1>Selamat Datang</h1>
                                <p>Selamat Datang di Website Resmi Desa Wonoharjo Kecamatan Girimulya Kabupaten Bengkulu
                                    Utara</p>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ asset('assets/img/slider/' . $item->file) }}" class="d-block w-100 h-100"
                                alt="...">
                        </div>
                    @endif
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    {{-- End Carousel --}}

    {{-- Start News --}}
    <div class="container my-5 pb-2">
        <div class="col-md-12 col-sm-12 col-xs-12" style="background-color: rgba(241, 241, 241, 0.644)">
            <div class="diveder text-center">
                <h2><span class="font-weight-bold">Berita Terbaru</span></h2>
                <hr class="my-4">
            </div>
        </div>
        <div class="card-group">
            @foreach ($news as $n)
                @php
                    $excerpt = substr($n->content, 0, 300);
                @endphp
                <div class="col-md-4 col-sm-4 col-xs-12 my-3">
                    <div class="card h-100 mx-2 shadow" style="border-radius: 30px">
                        <a href="{{ route('show-berita', $n->slug) }}" class="LinkBerita">
                            <img src="{{ asset('assets/img/news/' . $n->thumbnail) }}" class="card-img-top" alt="..."
                                height="200px">
                        </a>
                        <p class="card-text mt-1 mx-1">
                            <small class="text-muted">
                                <i class="bi bi-calendar">{{ $n->updated_at->format('d-m-Y') }}</i>
                                <i class="bi bi-person-fill">{{ $n->author }} </i>
                                @if ($n->tag == 'Prestasi')
                                    <i class="bi bi-bookmark-dash-fill"
                                        style="color: rgb(28, 192, 28)">{{ $n->tag }}</i>
                                @else
                                    @if ($n->tag == 'Pengumuman')
                                        <i class="bi bi-bookmark-dash-fill"
                                            style="color: rgb(47, 72, 218)">{{ $n->tag }}</i>
                                    @else
                                        <i class="bi bi-bookmark-dash-fill" style="color: black">{{ $n->tag }}</i>
                                    @endif
                                @endif
                            </small>
                        </p>
                        <hr class="my-0">
                        <div class="card-body">
                            <a href="{{ route('show-berita', $n->slug) }}" class="linkBerita">
                                <h5 class="card-title">{{ $n->title }}</h5>
                            </a>
                            <p class="card-text">{!! $excerpt !!} <a href="{{ route('show-berita', $n->slug) }}"
                                    class="text-end linkmore">Selanjutnya..</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- End News --}}
@endsection
