@extends('layouts.main')

@section('container')
<!-- Galeri Foto -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white" aria-current="page">Galeri Vidio</li>
  </ol>
</nav>

<section class="vidio tatanan" id="vidio">
  <div class="container">
    <div class="row mb-3">
      <div class="col-md-3">
        <form action="/vidio">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      @foreach ($galeriVidio as $vidio)
      <div class="col-md-3">
        <div class="ratio ratio-16x9">
          <iframe src="{{ $vidio->link_vidio }}" title="YouTube video" allowfullscreen></iframe>
        </div>
        <figcaption class="figure-caption pt-1">{{ $vidio->nama }}</figcaption>
      </div>
      @endforeach
    </div>
    
    <div class="d-flex justify-content-end">
      {{ $galeriVidio->links() }}
    </div>

  </div>
</section> 
@endsection