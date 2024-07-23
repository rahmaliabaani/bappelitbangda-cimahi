@extends('layouts.main')

@section('container')
<!-- Slider -->
<section class="beranda-publik" id="beranda">
  <div class="container">
    <swiper-container class="swiper-container" space-between="60" centered-slides="true" autoplay-delay="4000" loop="true">
      <swiper-slide>
        <div class="row">
          <div class="col-lg-6 mt-auto mb-auto">
            <h1 class="text-white text-center">Selamat Datang di Kota Cimahi.</h1>
            <h3 class="text-white text-center">Mewujudkan Cimahi Baru, Maju, Agamis, dan Berbudaya.</h3>
          </div>
          <div class="col-lg-6">
            <img src="img/selamat-datang.jpg" style="width: 37rem; height: 23rem; padding: 10px; background-color: #EC6E13;" alt="" class="shadow">
          </div>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="row">
          <div class="col-lg-6 mt-auto mb-auto">
            <h1 class="text-white text-center">BAPPELITBANGDA.</h1>
            <h3 class="text-white text-center">Badan Perencanaan, Pembangunan, Penelitian, dan Pengembangan Daerah.</h3>
          </div>
          <div class="col-lg-6">
            <img src="img/gedung-pemkot.svg" style="width: 37rem; height: 23rem; padding: 10px; background-color: #EC6E13;" alt="" class="shadow">
          </div>
        </div>
      </swiper-slide>
      <swiper-slide>
        <div class="row">
          <div class="col-lg-6 mt-auto mb-auto">
            <h1 class="text-white text-center">Cimahi Kota Cerdas.</h1>
            <h3 class="text-white text-center">Meningkatkan Keselarasan, Keseimbangan, dan Kesinambungan Pembangunan di Daerah.</h3>
          </div>
          <div class="col-lg-6">
            <img src="img/cimahi.webp" style="width: 37rem; height: 23rem; padding: 10px; background-color: #EC6E13;" alt="" class="shadow">
          </div>
        </div>
      </swiper-slide>
    </swiper-container>
  </div>
</section>

<!-- Informasi Publik -->
<section class="informasi-publik tatanan py-5" id="informasi-publik">
  <div class="container justify-content-center">
    <div class="row mb-4">
      <div class="col-md-12">
        <h3 class="text-uppercase text-center">informasi publik</h3>
      </div>
    </div>
    <div class="row">
      @foreach ($informasi as $info)
      <div class="col-lg-3 pb-3">
        <div class="card" style="border: none;">
          <div class="position-absolute px-3 py-2 text-white" style="background-color: #FF8E26;">{{ $info->KategoriInformasi->nama }}</div>
          @if ($info->gambar)
            <img src="{{ asset('storage/' . $info->gambar) }}" alt="{{ $info->KategoriInformasi->nama }}" class="card-img-top" style="max-height: 200px;">
          @else
            <img src="{{ asset('img/gambar-default(1).jpg') }}" alt="{{ $info->KategoriInformasi->nama }}" class="card-img-top" style="max-height: 200px;">
          @endif
          <div class="card-body">
            <p class="card-text text-secondary">{{ $info->publish_at->format('d F Y H:i') }}</p>
            <a href="/berita/{{ $info->slug }}" class="text-decoration-none fs-5">{{ $info->judul }}</a>
            <p class="card-text text-truncate">
                {{ strip_tags($info->deskripsi) }}
            </p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    
    <div class="row">
      <div class="col-md-12 mt-4">
        <a href="/informasi" class="btn btn-light fs-6 float-end shadow">Selengkapnya <img src="img/panah-oren.png" width="20px"></a>
      </div>
    </div>
  </div>
</section>

<!-- Tentang -->
<section class="tentang-instansi py-5" id="tentang-instansi">
  <div class="container text-center">
    <div class="row justify-content-center">
      <div class="col-md-10 text-white">
        <img src="img/bappelitbangda-logo.png" alt="" width="50px">
        <h2 class="my-3">BAPPELITBANGDA</h2>
        <p class="fs-4">Badan Perencanaan Pembangunan, Penelitian, dan Pengembangan Daerah merupakan salah satu badan penunjang Urusan Pemerintahan di bidang perencanaan, penelitian dan pengembangan yang menjadi kewenangan Daerah Kota. Bappelitbangda adalah badan yang melakukan perumusan dan pelaksanaan mengenai penyelenggaraan urusan pemerintahan, kebijakan, pembinaan, pengedalian, serta administrasi dalam urusan pemerintahan, bidang perencanaan pembangunan, penelitian dan pengembangan.
        </p>
        <button type="button" class="btn btn-light"><a href="/profil" class="text-decoration-none">Selengkapnya</a></button>
      </div>
    </div>
  </div>
</section>

<!-- Link -->
<section class="link-publik opacity-75 py-5" id="link-publik">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center text-white text-uppercase">mitra bappelitbangda kota cimahi</h3>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-3 pb-3">
        <div class="card shadow" style="height: 8rem;">
          <div class="card-body">
            <img src="img/logocimahi.png" alt="" class="col-lg-8 m-auto mt-2 d-flex justify-content-center">
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card shadow" style="height: 8rem;">
          <div class="card-body">
            <img src="img/pemprov.png" alt="" class="col-lg-9 m-auto d-flex justify-content-center">
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card shadow" style="height: 8rem;">
          <div class="card-body">
            <img src="img/diskominfo.png" alt="" class="col-lg-11 m-auto mt-2 d-flex justify-content-center">
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card shadow" style="height: 8rem;">
          <div class="card-body">
            <img src="img/bps-cimahi.png" alt="" class="col-lg-12 m-auto mt-2 d-flex justify-content-center">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

