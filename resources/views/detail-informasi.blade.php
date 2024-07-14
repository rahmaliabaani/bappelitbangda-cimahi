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
      <div class="col-md-12">
        <h3 class="text-start">{{ $informasi->judul }}</h3>
        <p class="text-start">{{ $informasi->publish_at->format('d F Y H:i') }}</p>

        @if ($informasi->gambar)
          <div style="max-height: 350px; max-width: 600px; overflow: hidden;" class="m-auto">
            <img src="{{ asset('storage/' . $informasi->gambar) }}" alt="{{ $informasi->kategoriInformasi->nama }}" class="img-fluid mt-3">
            {{-- <img src="{{ route('gambar.displayImage' , $informasi->gambar) }}" alt="{{ $informasi->kategoriInformasi->nama }}" class="img-fluid mt-3"> --}}
          </div>
        @else
          <div style="max-height: 350px; max-width: 600px; overflow: hidden;" class="m-auto">
            <img src="{{ asset('img/gambar-default(1).jpg') }}" alt="{{ $informasi->kategoriInformasi->nama }}" class="img-fluid mt-3">
          </div>
        @endif

        {{-- <img src="../img/beranda.jpg" alt="" width="500px"> --}}
        <p class="pt-4 text-center">By. {{ $informasi->user->name }}</p>
        <h5 class="lh-base fw-normal kanankiri">
           {!! nl2br($informasi->deskripsi) !!}
        </h5>
      </div>
    </div>
  </div>
</section>
@endsection