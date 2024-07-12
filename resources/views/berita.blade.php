@extends('layouts.main')

@section('container')
<!-- Berita -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white" aria-current="page">Berita</li>
  </ol>
</nav>

<section class="berita tatanan" id="berita">
  <div class="container">
    <div class="row mb-3">
      <div class="col-lg-3">
        <form action="/berita">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      @if ($berita->count())
      @foreach ($berita as $brt)
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <div class="position-absolute px-3 py-2 text-white" style="background-color: #FF8E26;">{{ $brt->kategoriBerita->nama }}</div>
          <img src="img/beranda.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">{{ $brt->publish_at->format('d F Y H:i') }}</p>
            <a href="/berita/{{ $brt->slug }}" class="text-decoration-none fs-5">{{ $brt->judul }}</a>
            <p class="card-text text-truncate">
                {{ $brt->deskripsi }}
            </p>
          </div>
        </div>
      </div>
      @endforeach    
      @else
        <p class="fs-4 text-center">No post found.</p>
      @endif
    </div>

    <div class="d-flex justify-content-end">
        {{ $berita->links() }}
    </div>
  </div>
</section>    
@endsection