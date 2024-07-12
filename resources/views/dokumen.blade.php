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
                @php
                  $id=1;
                @endphp
                @foreach ($dokumen1 as $dkn1)
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $dkn1->nama }}</td>
                  <td><a href="/detail-dokumen">Lihat</a></td>
                </tr>
                @php
                    $id++;
                @endphp
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
                @php
                  $id=1;
                @endphp
                @foreach ($dokumen2 as $dkn2)
                <tr>
                  <td>{{ $id }}</td>
                  <td>{{ $dkn2->nama }}</td>
                  <td><a href="/detai-dokumen">Lihat</a></td>
                </tr>
                @php
                    $id++;
                @endphp
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