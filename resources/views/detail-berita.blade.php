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
      <div class="col-md-12 text-center">
        <h3 class="text-start">{{ $berita->judul }}</h3>
        <p class="text-start">{{ $berita->publish_at->format('d F Y H:i') }}</p>
        <img src="/img/beranda.jpg" class="mb-3" alt="" width="500px">
        <p class="pt-2">By. {{ $berita->user->name }}</p>
        <h5 class="lh-base fw-normal kanankiri">
          {!! nl2br(e($berita->deskripsi)) !!}
        </h5>
      </div>
    </div>
  </div>
</section>
@endsection