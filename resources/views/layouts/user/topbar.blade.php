<nav class="navbar navbar-expand-lg navbar-light bg-navbar sticky-top"
    style="border-bottom-right-radius: 30px;border-bottom-left-radius: 30px">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('/assets/img/logo.png') }}" height="60px" width="45" alt="logo">
            <small style="font-size: 20px">Desa Wonoharjo</small>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-end" id="navbarSupportedContent">
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-uppercase {{ $title === 'Beranda' ? 'active' : '' }}" aria-current="page"
                        href="/">beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase {{ $title === 'Sejarah' || $title === 'Struktur Organisasi' || $title === 'Visi Misi' ? 'active' : '' }}"
                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-uppercase {{ $title === 'Sejarah' ? 'active' : '' }}"
                                href="{{ route('sejarah') }}">Sejarah</a></li>
                        <li><a class="dropdown-item text-uppercase {{ $title === 'Visi Misi' ? 'active' : '' }}"
                                href="{{ route('visi-misi') }}">visi misi</a></li>
                        <li><a class="dropdown-item text-uppercase {{ $title === 'Struktur Organisasi' ? 'active' : '' }}"
                                href="{{ route('struktur-organisasi') }}">struktur
                                organisasi</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase {{ $title === 'Berita' ? 'active' : '' }}"
                        href="{{ route('berita') }}">berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase {{ $title === 'Usaha Desa' ? 'active' : '' }}"
                        href="{{ route('usaha-desa') }}">usaha
                        desa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase {{ $title === 'Monografi' ? 'active' : '' }}"
                        href="{{ route('monografi') }}">Monografi</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-uppercase {{ $title === 'Galeri Foto' || $title === 'Galeri Video' ? 'active font-weight-bold' : '' }}"
                        href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        galeri
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-uppercase {{ $title === 'Galeri Foto' ? 'active' : '' }}"
                                href="{{ route('galeri-foto') }}">foto</a></li>
                        <li><a class="dropdown-item text-uppercase {{ $title === 'Galeri Video' ? 'active' : '' }}"
                                href="{{ route('galeri-video') }}">video</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button id="searchButton" type="button" class="btn " data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="bi bi-search text-custom"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Pencarian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="get" action="{{ route('search') }}" role="search">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <textarea class="form-control" id="keyword" name="keyword"
                            placeholder="Tulis Di Sini"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>
