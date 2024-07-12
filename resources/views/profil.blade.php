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
        <div class="accordion mb-5" id="accordionPanelsStayOpenExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                Tujuan dan Sasaran
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body">
                <strong class="text-uppercase">tujuan :</strong>
                <p class="mt-2">"Cimahi Kota Cerdas".</p>
                <strong class="text-uppercase">sasaran :</strong>
                <ol class="mt-2">
                    <li class="mt-2">Mewujudkan kualitas kehidupan masyarakat berakhlak mulia, berbudaya, menerapkan ilmu dan teknologi, memiliki jejaring sosial, 
                        produktif dan unggul.</li>
                    <li class="mt-2">Mewujudkan tata kelola pemerintahan yang baik.</li>
                    <li class="mt-2">Meningkatkan perekonomian yang berdaya saing serta berbasis inovasi daerah.</li>
                    <li class="mt-2">Mewujudkan keserasian pembangunan yang berkeadilan.</li>
                    <li class="mt-2">Mewujudkan lingkungan hidup yang berkelanjutan.</li>
                </ol>
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
                <p class="mt-2">Memimpin, merumuskan, membina, memfasilitasi, mengoordinasikan, dan mengendalikan penyelenggaraan bidang perencanaan 
                    pembangunan, pengendalian dan evaluasi.</p>
                <strong class="text-uppercase">fungsi :</strong>
                <ol class="mt-2">
                    <li class="mt-2">Pengkajian dan analisis perencanaan dan pendanaan pembangunan daerah.</li>
                    <li class="mt-2">Pengkajian dan analisis kewilayahan.</li>
                    <li class="mt-2">Pengintegrasian dan harmonisasi program-program pembangunan daerah.</li>
                    <li class="mt-2">Perumusan kebijakan dalam penyusunan perencanaan, pengendalian, evaluasi dan informasi pembangunan daerah.</li>
                    <li class="mt-2">Pengoordinasian dan sinkronisasi pelaksanaan kebijakan perencanaan dan penganggaran daerah.</li>
                    <li class="mt-2">Pelaksanaan evaluasi terhadap kebijakan perencanaan pembangunan daerah, pelaksanaan rencana pembangunan daerah, 
                        serta hasil rencana pembangunan daerah.</li>
                    <li class="mt-2">Pengamanan data informasi pembangunan daerah.</li>
                </ol>
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
                <strong class="text-uppercase">sejarah</strong>
                <p class="mt-2">Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah (Bappelitbangda) Kota Cimahi dibentuk 
                    berdasarkan landasan hukum salah satunya yaitu, Peraturan Daerah Kota Cimahi Nomor 6 Tahun 2016 tentang Pembentukan dan 
                    Susunan Perangkat Daerah Kota Cimahi.</p>
                <p>Bappelitbangda Kota Cimahi dibentuk dalam rangka peningkatan keselarasan pembangunan di daerah agar terjadi keselarasan 
                    antara pembangunan sektoral dan pembangunan daerah. Selain itu, Bappelitbangda Kota Cimahi dibentuk untuk menjamin laju 
                    perkembangan, keseimbangan dan kesinambungan pembangunan di daerah, diperlukan perencanaan yang lebih menyeluruh, 
                    terarah dan terpadu.</p>
                <p>Badan Perencanaan Pembangunan, Penelitian dan Pengembangan Daerah merupakan unsur penunjang Urusan Pemerintahan 
                    di bidang perencanaan, penelitian dan pengembangan yang menjadi kewenangan daerah kota dipimpin oleh Kepala Badan, 
                    yang berkedudukan di bawah dan bertanggung jawab kepada Wali Kota melalui Sekretaris Daerah.</p> 
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
                <div class="accordion-body row justify-content-center">
                    <strong class="text-uppercase text-center mt-2 mb-4">pejabat BAPPELITBANGDA</strong>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="/img/beranda.jpg" class="card-img-top" alt="...">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item">Rahmalia Nuursya'baani</li>
                                <li class="list-group-item">Kepala Bidang P3E</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="/img/beranda.jpg" class="card-img-top" alt="...">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item">Rahmalia Nuursya'baani</li>
                                <li class="list-group-item">Kepala Bidang P3E</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="/img/beranda.jpg" class="card-img-top" alt="...">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item">Rahmalia Nuursya'baani</li>
                                <li class="list-group-item">Kepala Bidang P3E</li>
                            </ul>
                        </div>
                    </div>
                </div>   
                <div class="accordion-body row justify-content-center">
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="/img/beranda.jpg" class="card-img-top" alt="...">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item">Rahmalia Nuursya'baani</li>
                                <li class="list-group-item">Kepala Bidang P3E</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="/img/beranda.jpg" class="card-img-top" alt="...">
                            <ul class="list-group list-group-flush text-center">
                                <li class="list-group-item">Rahmalia Nuursya'baani</li>
                                <li class="list-group-item">Kepala Bidang P3E</li>
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
                <div class="row mt-4 justify-content-center">
                    <div class="col-md-7">
                        <img src="/img/struktur.png" class="img-fluid" alt="struktur organisasi">
                    </div>
                </div>                 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection