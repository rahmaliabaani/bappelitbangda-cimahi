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
    <div class="row mb-3">
      <div class="col-md-3">
        <form action="/foto">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
      <figure class="figure">
          <img src="img/3.jpg" class="figure-img img-fluid rounded" alt="...">
          <figcaption class="figure-caption">A caption for the above image.</figcaption>
        </figure>
      </div>
      <div class="col-md-3">
      <figure class="figure">
          <img src="img/beranda.jpg" class="figure-img img-fluid rounded" alt="...">
          <figcaption class="figure-caption">A caption for the above image.</figcaption>
        </figure>
      </div>
      <div class="col-md-3">
      <figure class="figure">
          <img src="img/2.jpg" class="figure-img img-fluid rounded" alt="...">
          <figcaption class="figure-caption">A caption for the above image.</figcaption>
        </figure>
      </div>
      <div class="col-md-3">
      <figure class="figure">
          <img src="img/3.jpg" class="figure-img img-fluid rounded" alt="...">
          <figcaption class="figure-caption">A caption for the above image.</figcaption>
        </figure>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-3">
        <nav aria-label="Page navigation example" class="float-end">
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</section>
@endsection