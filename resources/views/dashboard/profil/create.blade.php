@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Tambah Profil</h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="periode" placeholder="Periode">
            <label for="periode">Periode</label>
          </div>
        </div>
        <div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -2px;">Gambar Struktur Organisasi</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
      </div>
      <div class="row pt-2">
        <div class="col-md-6">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Tugas</label>
          </div>
        </div>
      	<div class="col-md-6">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Tujuan</label>
          </div>
        </div>
			</div>
      <div class="row pt-2">
        <div class="col-md-6">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Fungsi</label>
          </div>
        </div>
      	<div class="col-md-6">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Sasaran</label>
          </div>
        </div>
			</div>
      <div class="row pt-2 pb-2">
        <div class="col-md-6">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Sejarah</label>
          </div>
        </div>
			</div>
      <hr>
      <div class="row pt-2">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="periode" placeholder="Periode">
            <label for="periode">Nama Kepala Badan</label>
          </div>
        </div>
      	<div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="periode" placeholder="Periode">
            <label for="periode">Nama Kepala Bidang P3E</label>
          </div>
        </div>
			</div>
      <div class="row pt-2">
        <div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -2px;">Foto Kepala Badan</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
      	<div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -2px;">Foto Kepala Bidang P3E</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
			</div>
      <div class="row pt-2">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="periode" placeholder="Periode">
            <label for="periode">Nama Kepala Bidang P3M</label>
          </div>
        </div>
      	<div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="periode" placeholder="Periode">
            <label for="periode">Nama Kepala Bidang PP</label>
          </div>
        </div>
			</div>
      <div class="row pt-2">
        <div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -2px;">Foto Kepala Bidang P3M</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
      	<div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -2px;">Foto Kepala Bidang PP</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
			</div>
      <div class="row pt-2">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="periode" placeholder="Periode">
            <label for="periode">Nama Kepala Bidang PESD</label>
          </div>
        </div>
      	<div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="periode" placeholder="Periode">
            <label for="periode">Nama Kepala Bidang PIK</label>
          </div>
        </div>
			</div>
      <div class="row pt-2 pb-3">
        <div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -2px;">Foto Kepala Bidang PESD</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
      	<div class="col-md-6">
          <div>
            <label for="formFileSm" class="form-label" style="margin-bottom: -2px;">Foto Kepala Bidang PIK</label>
            <input class="form-control form-control-sm" id="formFileSm" type="file">
          </div>
        </div>
			</div>

      <button type="button" class="btn btn-primary"><a href="/kelola-profil" class="text-decoration-none text-white">Simpan</a></button>
      <button type="button" class="btn btn-danger"><a href="/kelola-profil" class="text-decoration-none text-white">Batal</a></button>  
      
    </div>
  
      <canvas class="my-4 w-100" id="myChart" width="900" height="150"></canvas>
</main>
@endsection