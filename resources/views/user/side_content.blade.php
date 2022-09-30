<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
    <div class="card my-3">
        <h5 class="card-header text-center">Berita Terbaru</h5>
        <div class="card-body">
            <ul class="list-group">
                @foreach ($news as $n)
                    <li class="list-group-item"><a href="{{ route('show-berita', $n->slug) }}"
                            class="linkBerita">{{ $n->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card my-3">
        <h5 class="card-header text-center">Kategori</h5>
        <div class="card-body">
            @foreach ($tag as $t)
                @if ($t->tag == 'Prestasi')
                    <a class="btn btn-success my-1" href="{{ route('kategori-berita', $t->tag) }}" role="button">
                        <i class="bi bi-bookmark-dash-fill">{{ $t->tag }}</i>
                    </a>
                @else
                    @if ($t->tag == 'Pengumuman')
                        <a class="btn btn-primary my-1" href="{{ route('kategori-berita', $t->tag) }}" role="button">
                            <i class="bi bi-bookmark-dash-fill">{{ $t->tag }}</i>
                        </a>
                    @else
                        <a class="btn btn-dark my-1" href="{{ route('kategori-berita', $t->tag) }}" role="button">
                            <i class="bi bi-bookmark-dash-fill">{{ $t->tag }}</i>
                        </a>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
