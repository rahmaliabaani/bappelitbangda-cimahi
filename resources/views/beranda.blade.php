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
            <img src="img/beranda.jpg" style="width: 37rem; padding: 10px; background-color: #EC6E13;" alt="" class="shadow">
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
            <img src="img/2.jpg" style="width: 37rem; padding: 10px; background-color: #EC6E13;" alt="" class="shadow">
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
            <img src="img/3.jpg" style="width: 37rem; padding: 10px; background-color: #EC6E13;" alt="" class="shadow">
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
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/beranda.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Pelajar SMP Se-Kota Cimahi Ikuti Festival Social Studies.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Pemkot Cimahi Bakal Terbitkan SPPT PBB Hybrid.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Disdukcapil Kota Cimahi Kebut Perekaman dan Pembuatan KTP.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/beranda.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Pelajar SMP Se-Kota Cimahi Ikuti Festival Social Studies.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/beranda.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Disdukcapil Kota Cimahi Kebut Perekaman dan Pembuatan KTP.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/2.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Pemkot Cimahi Bakal Terbitkan SPPT PBB Hybrid.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/3.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Pelajar SMP Se-Kota Cimahi Ikuti Festival Social Studies.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card" style="width: 19rem; border: none;">
          <img src="img/beranda.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text text-secondary">08 Agustus 2023 11.11</p>
            <a href="/" class="text-decoration-none fs-5">Pemkot Cimahi Bakal Terbitkan SPPT PBB Hybrid.</a>
            <p class="card-text">Lorem ipsum dolor, sit amet consectet...</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-4">
        <a href="/informasi" class="btn btn-light fs-5 float-end shadow">Selengkapnya <img src="img/panah-oren.png" width="25px"></a>
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
        <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo laboriosam ducimus aut explicabo. Odio aperiam neque praesentium illum magnam reprehenderit? Cupiditate, dolores laborum ipsum possimus esse fugit sapiente totam iusto corrupti, corporis impedit ullam qui nesciunt, laboriosam quis minima hic nam distinctio vel? Consequuntur similique quasi consectetur impedit tempore velit?
        </p>
        <button type="button" class="btn btn-light"><a href="/dokumen" class="text-decoration-none">Selengkapnya</a></button>
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
        <div class="card shadow" style="width: 19rem; height: 8rem;">
          <div class="card-body text-center">
            <a href="#"><img src="img/logocimahi.png" alt="" style="margin-top: 0.3rem;"></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3 ">
        <div class="card shadow" style="width: 19rem; height: 8rem;">
          <div class="card-body text-center">
            <a href="#"><img src="img/pemprov.png" alt="" class="w-100" style="margin-top: -1.2rem;"></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card shadow" style="width: 19rem; height: 8rem;">
          <div class="card-body text-center">
            <a href="#"><img src="img/diskominfo.png" alt="" class="mt-1 w-100"></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 pb-3">
        <div class="card shadow" style="width: 19rem; height: 8rem;">
          <div class="card-body text-center">
            <a href="#"><img src="img/bps-cimahi.png" alt="" class="mt-2 w-100"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

