@extends('dashboard.layouts.main')

@section('container')
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Selamat Datang {{ auth()->user()->name }}</h1>
        </div>
        <div class="row">
          <div class="col-sm-6 pb-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-9">
                    <h5 class="card-title">Informasi Publik Telah diPublis</h5>
                    <p class="card-text fs-1">{{ $totalInformasi }}</p>
                  </div>
                  <div class="col-lg-3 px-0">
                    <img src="/img/diagram.svg" alt="" width="100px">
                  </div>
                </div>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Informasi Publik Berdasarkan Kategori
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <table class="table table-borderless">
                          <tbody>
                            @foreach ($kategoriI as $katinfo)
                            <tr>
                              <th>{{ $loop->iteration }}</th>
                              <td>{{ $katinfo->nama }}</td>
                              <td>:</td>
                              <td>{{ $katinfo->informasi_count }}</td>
                            </tr> 
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 pb-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-9">
                    <h5 class="card-title">Berita Telah diPublis</h5>
                    <p class="card-text fs-1">{{ $totalBerita }}</p>
                  </div>
                  <div class="col-lg-3 px-0">
                    <img src="/img/diagram (1).svg" alt="" width="100px">
                  </div>
                </div>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Berita Berdasarkan Kategori
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <table class="table table-borderless">
                          <tbody>
                            @foreach ($kategoriB as $katberi)
                            <tr>
                              <th>{{ $loop->iteration }}</th>
                              <td>{{ $katberi->nama }}</td>
                              <td>:</td>
                              <td>{{ $katberi->berita_count }}</td>
                            </tr> 
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 pb-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-9">
                    <h5 class="card-title">Dokumen Arsip Paparan Telah diPublis</h5>
                    <p class="card-text fs-1">{{ $totalDokA }}</p>
                  </div>
                  <div class="col-lg-3 px-0">
                    <img src="/img/diagram (2).svg" alt="" width="100px">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 pb-3">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-9">
                    <h5 class="card-title">Dokumen Perencanaan Telah diPublis</h5>
                    <p class="card-text fs-1">{{ $totalDokP }}</p>
                  </div>
                  <div class="col-lg-3 px-0">
                    <img src="/img/diagram (3).svg" alt="" width="100px">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="90"></canvas>
      </main>
    </div> 
  </div>

</body>
</html>
@endsection
