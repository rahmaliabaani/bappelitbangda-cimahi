@extends('layouts.main')

@section('container')

<!-- Informasi Publik -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white" aria-current="page">Informasi Publik</li>
  </ol>
</nav>

<section class="informasi tatanan" id="informasi">
  <div class="container">
    <div class="row mb-3">
      <div class="col-lg-3">
        <form action="/informasi" method="GET">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      @if ($informasi->count())
      @foreach ($informasi as $info)
      <div class="col-lg-3 pb-3">
        <div class="card" style="border: none;">
          <div class="position-absolute px-3 py-2 text-white" style="background-color: #FF8E26;">{{ $info->kategoriInformasi->nama }}</div>
          @if ($info->gambar)
            <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->kategoriInformasi->nama }}" class="card-img-top" style="max-height: 200px;">
          @else
            <img src="{{ asset('img/gambar-default(1).jpg') }}" alt="{{ $info->kategoriInformasi->nama }}" class="card-img-top" style="max-height: 200px;">
          @endif
          <div class="card-body">
            <p class="card-text text-secondary">{{ $info->publish_at->format('d F Y H:i') }}</p>
            <a href="/informasi/{{ $info->slug }}" class="text-decoration-none fs-5">{{ $info->judul }}</a>
            <p class="card-text text-truncate">
                {{ strip_tags($info->deskripsi) }}
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
      {{ $informasi->links() }}
    </div>
  </div>
</section>
@endsection