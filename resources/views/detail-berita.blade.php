@extends('layouts.main')

@section('container')
<!-- Berita -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white" aria-current="page">Berita</li>
    <li class="breadcrumb-item text-white" aria-current="page">{{ $berita->kategoriBerita->nama }}</li>
  </ol>
</nav>

<section class="berita tatanan" id="berita">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-start">{{ $berita->judul }}</h3>
        <p class="text-start">{{ $berita->publish_at->format('d F Y H:i') }}</p>
        @if ($berita->gambar)
          <div style="max-height: 350px; max-width: 600px; overflow: hidden;" class="m-auto">
            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->kategoriBerita->nama }}" class="img-fluid mt-3">
          </div>
        @else
          <div style="max-height: 350px; max-width: 600px; overflow: hidden;" class="m-auto">
            <img src="{{ asset('img/gambar-default(1).jpg') }}" alt="{{ $berita->kategoriBerita->nama }}" class="img-fluid mt-3">
          </div>
        @endif
        <p class="pt-4 text-center">By. {{ $berita->user->name }}</p>
        <h5 class="lh-base fw-normal kanankiri">
          {!! nl2br($berita->deskripsi) !!}
        </h5>
        <button type="button" class="btn btn-primary pt-2"><a href="/berita" class="text-decoration-none text-white"><i class="bi bi-reply"></i> Kembali</a></button>
      </div>
    </div>
  </div>
</section>
@endsection