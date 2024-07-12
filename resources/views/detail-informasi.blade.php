@extends('layouts.main')

@section('container')

<!-- Informasi Publik -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white " aria-current="page">Informasi Publik</li>
    <li class="breadcrumb-item text-white" aria-current="page">{{ $informasi->kategoriInformasi->nama }}</li>
  </ol>
</nav>

<section class="informasi tatanan" id="informasi">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h3 class="text-start">{{ $informasi->judul }}</h3>
        <p class="text-start">{{ $informasi->publish_at->format('d F Y H:i') }}</p>
        <img src="../img/beranda.jpg" alt="" width="500px">
        <p class="pt-4">By. {{ $informasi->user->name }}</p>
        <h5 class="lh-base fw-normal kanankiri">
           {!! nl2br($informasi->deskripsi) !!}
        </h5>
      </div>
    </div>
  </div>
</section>
@endsection