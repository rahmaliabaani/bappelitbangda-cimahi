@extends('layouts.main')

@section('container')
<!-- Galeri Foto -->
<nav aria-label="breadcrumb" class="nav-crumb">
  <ol class="breadcrumb p-3">
    <li class="breadcrumb-item text-white" aria-current="page">Galeri Foto</li>
  </ol>
</nav>

<section class="foto tatanan" id="foto">
  <div class="container">
    <div class="row pb-3">
      <div class="col-md-3">
        <form action="/foto">
          <div class="input-group pb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      @foreach ($galeriFoto as $foto)
      <div class="col-md-3">
      <figure class="figure">
          <img src="{{ asset('storage/' . $foto->gambar) }}" class="figure-img img-fluid rounded" alt="...">
          <figcaption class="figure-caption">{{ $foto->nama }}</figcaption>
        </figure>
      </div>
      @endforeach
    </div>

    <div class="d-flex justify-content-end">
      {{ $galeriFoto->links() }}
    </div>
  </div>
</section>
@endsection