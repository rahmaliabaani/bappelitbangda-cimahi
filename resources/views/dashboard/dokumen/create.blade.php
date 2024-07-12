@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Tambah Dokumen</h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-floating">
            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
              <option selected>Kategori Dokumen</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
            <label for="floatingSelect">Pilih Kategori Dokumen</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="slug" placeholder="Slug">
            <label for="slug">Slug</label>
          </div>
        </div>
      </div>
      <div class="row pt-3 pb-3">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="judul" placeholder="Judul">
            <label for="judul">Nama Dokumen</label>
          </div>
        </div>
      	<div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -5px;">Dokumen</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
			</div>
      <button type="button" class="btn btn-primary"><a href="/kelola-dokumen" class="text-decoration-none text-white">Simpan</a></button>
      <button type="button" class="btn btn-danger"><a href="/kelola-dokumen" class="text-decoration-none text-white">Batal</a></button>
      </div>
  
      <canvas class="my-4 w-100" id="myChart" width="900" height="150"></canvas>
  </main>
@endsection