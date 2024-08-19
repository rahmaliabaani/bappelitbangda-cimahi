@extends('layouts.main')

@section('container')
<!-- Profil -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white" aria-current="page">Profil</li>
  </ol>
</nav>

<section class="text2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <h4 class="text-uppercase text-white text-center p-4">badan perencanaan, pembangunan, penelitian, dan pengembangan daerah kota cimahi</h4>
        </nav>
      </div>
    </div>
  </div>
</section>

<section class="profil tatanan" id="profil">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="accordion pb-3" id="accordionPanelsStayOpenExample">
          @foreach ($profils as $profil)
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Tujuan dan Sasaran
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <strong class="text-uppercase">tujuan :</strong>
                <p class="mt-2">"{{ strip_tags($profil->tujuan) }}".</p>
                <strong class="lh-base text-uppercase">sasaran :</strong>
                <div class="pt-1 lh-lg">
                  {!! str_replace('.', '.<br>', $profil->sasaran) !!}
                </div>  
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                Tugas Pokok dan Fungsi
              </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
              <div class="accordion-body">
                <strong class="text-uppercase">tugas pokok :</strong>
                <p class="mt-2">{{ strip_tags($profil->tugas) }}</p>
                <strong class="text-uppercase">fungsi :</strong>
                <div class="pt-1 lh-lg">
                  {!! str_replace('.', '.<br>', $profil->fungsi) !!}
                </div> 
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                Sejarah Singkat
              </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
              <div class="accordion-body ">
                <strong class="text-uppercase lh-lg">sejarah</strong>
                <div class="lh-lg">
                  {!! nl2br($profil->sejarah) !!}
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                Pejabat BAPPELITBANGDA
              </button>
            </h2>
            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                <div class="accordion-body row d-flex justify-content-center">
                  <strong class="text-uppercase text-center pt-2 pb-4">pejabat BAPPELITBANGDA</strong>
                  <div class="col-lg-3 text-center">
                    <div class="card border-0">
                    @if ($profil->official->foto_kepala_badan)
                      <img src="{{ asset('storage/' . $profil->official->foto_kepala_badan) }}" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                    @else
                      <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                    @endif
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $profil->official->nama_kepala_badan }}</li>
                        <li class="list-group-item">Kepala Badan BAPPELITBANGDA</li>
                      </ul>
                    </div>
                  </div>
                </div>  
                <div class="accordion-body row d-flex justify-content-center">
                  <div class="col-lg-3 text-center">
                    <div class="card border-0">
                    @if ($profil->official->foto_sekretaris)
                      <img src="{{ asset('storage/' . $profil->official->foto_sekretaris) }}" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                    @else
                      <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                    @endif
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $profil->official->nama_sekretaris }}</li>
                        <li class="list-group-item">Sekretaris</li>
                      </ul>
                    </div>
                  </div>
                </div> 
                <div class="accordion-body row d-flex justify-content-center">
                  <div class="col-lg-2 text-center pb-3">
                    <div class="card border-0">
                      @if ($profil->official->foto_kepalabidang_p3e)
                        <img src="{{ asset('storage/' . $profil->official->foto_kepalabidang_p3e) }}" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @else
                        <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @endif
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $profil->official->nama_kepalabidang_p3e }}</li>
                          <li class="list-group-item">Kepala Bidang P3E</li>
                        </ul>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center pb-3">
                    <div class="card border-0">
                      @if ($profil->official->foto_kepalabidang_p3m)
                        <img src="{{ asset('storage/' . $profil->official->foto_kepalabidang_p3m) }}" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @else
                        <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @endif
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $profil->official->nama_kepalabidang_p3m }}</li>
                          <li class="list-group-item">Kepala Bidang P3M</li>
                        </ul>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center pb-3">
                    <div class="card border-0">
                      @if ($profil->official->foto_kepalabidang_pp)
                        <img src="{{ asset('storage/' . $profil->official->foto_kepalabidang_pp) }}" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @else
                        <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @endif
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $profil->official->nama_kepalabidang_pp }}</li>
                          <li class="list-group-item">Kepala Bidang LITBANG</li>
                        </ul>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center pb-3">
                    <div class="card border-0">
                      @if ($profil->official->foto_kepalabidang_pesd)
                        <img src="{{ asset('storage/' . $profil->official->foto_kepalabidang_pesd) }}" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @else
                        <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @endif
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $profil->official->nama_kepalabidang_pesd }}</li>
                          <li class="list-group-item">Kepala Bidang PESDA</li>
                        </ul>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center pb-3">
                    <div class="card border-0">
                      @if ($profil->official->foto_kepalabidang_pik)
                        <img src="{{ asset('storage/' . $profil->official->foto_kepalabidang_pik) }}" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @else
                        <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @endif
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">{{ $profil->official->nama_kepalabidang_pik }}</li>
                          <li class="list-group-item">Kepala Bidang INFRASWIL</li>
                        </ul>
                    </div>
                  </div>
                </div> 
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                Struktur Organisasi
              </button>
            </h2>
            <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFive">
              <div class="accordion-body">
                <div class="row text-center">
                    <b class="text-uppercase mt-2">struktur organisasi</b>
                </div>
                <div class="row pt-4 d-flex justify-content-center">
                    <div class="col-lg-7 pb-3">
                      @if ($profil->gambar_struktur)
                        <img src="{{ asset('storage/' . $profil->gambar_struktur) }}" id="img-preview" class="img-fluid m-auto" style="width: 700px; height: 500px;">
                      @else
                        <img src="/img/default-orang.jpg" id="img-preview" class="img-fluid m-auto" style="width: 160px; height: 200px;">
                      @endif
                    </div>
                </div>                 
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection