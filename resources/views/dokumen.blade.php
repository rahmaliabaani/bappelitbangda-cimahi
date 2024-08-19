@extends('layouts.main')

@section('container')
<!-- Dokumen -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white" aria-current="page">Dokumen</li>
  </ol>
</nav>

<section class="dokumen tatanan" id="dokumen" style="padding-top: 3rem;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Arsip Paparan</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Dokumen Perencanaan</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="monev-tab" data-bs-toggle="tab" data-bs-target="#monev-tab-pane" type="button" role="tab" aria-controls="monev-tab-pane" aria-selected="false">Dokumen Monev</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="litbang-tab" data-bs-toggle="tab" data-bs-target="#litbang-tab-pane" type="button" role="tab" aria-controls="litbang-tab-pane" aria-selected="false">Dokumen Kelitbangan</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <table class="table table-bordered table-responsive table-light mt-4 text-center">
              <thead>
                <tr>
                  <th col style="width: 5%;">No</th>
                  <th>Dokumen</th>
                  <th style="width: 7%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dokumen1 as $dkn1)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $dkn1->nama }}</td>
                  <td><a href="{{ asset('storage/' . $dkn1->dokumen) }}" target="_blank">Lihat</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <table class="table table-bordered table-responsive table-light mt-4 text-center">
              <thead>
                <tr>
                  <th col style="width: 5%;">No</th>
                  <th>Dokumen</th>
                  <th style="width: 7%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dokumen2 as $dkn2)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $dkn2->nama }}</td>
                  <td><a href="{{ asset('storage/' . $dkn2->dokumen) }}" target="_blank">Lihat</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="monev-tab-pane" role="tabpanel" aria-labelledby="monev-tab" tabindex="0">
            <table class="table table-bordered table-responsive table-light mt-4 text-center">
              <thead>
                <tr>
                  <th col style="width: 5%;">No</th>
                  <th>Dokumen</th>
                  <th style="width: 7%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dokumen3 as $dkn3)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $dkn3->nama }}</td>
                  <td><a href="{{ asset('storage/' . $dkn3->dokumen) }}" target="_blank">Lihat</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="litbang-tab-pane" role="tabpanel" aria-labelledby="litbang-tab" tabindex="0">
            <table class="table table-bordered table-responsive table-light mt-4 text-center">
              <thead>
                <tr>
                  <th col style="width: 5%;">No</th>
                  <th>Dokumen</th>
                  <th style="width: 7%;">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dokumen4 as $dkn4)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $dkn4->nama }}</td>
                  <td><a href="{{ asset('storage/' . $dkn4->dokumen) }}" target="_blank">Lihat</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection