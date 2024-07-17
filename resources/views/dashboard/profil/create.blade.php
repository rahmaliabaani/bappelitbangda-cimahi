@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Tambah Profil</h3>
      </div>
      <form action="/dashboard/profil" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-6">
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode" name="periode" required placeholder="Periode" value="{{ old('periode') }}">
            <label for="periode">Periode</label>
            @error('periode')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
        </div>
        <div class="col-lg-6">
          <div class="pb-3">
            <label for="gambar" class="form-label" style="margin-bottom: -1px;">Gambar Struktur Organisasi</label>
              <img src="" id="img-preview" class="img-fluid mt-1 col-sm-3 d-block">
              <input class="form-control mt-2 form-control-sm @error('gambar_struktur') is-invalid @enderror" id="gambar" name="gambar_struktur" type="file">
              @error('gambar_struktur')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="pb-3">
            <label for="tugas" class="form-label">Tugas</label>
            @error('tugas')
              <p class="text-danger">{{ $message }}</p>
            @enderror
              <input id="tugas" type="hidden" name="tugas" required value="{{ old('tugas') }}">
            <trix-editor input="tugas"></trix-editor>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="pb-3">
            <label for="tujuan" class="form-label">Tujuan</label>
            @error('tujuan')
              <p class="text-danger">{{ $message }}</p>
            @enderror
              <input id="tujuan" type="hidden" name="tujuan" required value="{{ old('tujuan') }}">
            <trix-editor input="tujuan"></trix-editor>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="pb-3">
            <label for="fungsi" class="form-label">Fungsi</label>
            @error('fungsi')
              <p class="text-danger">{{ $message }}</p>
            @enderror
              <input id="fungsi" type="hidden" name="fungsi" required value="{{ old('fungsi') }}">
            <trix-editor input="fungsi"></trix-editor>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="pb-3">
            <label for="sasaran" class="form-label">Sasaran</label>
            @error('sasaran')
              <p class="text-danger">{{ $message }}</p>
            @enderror
              <input id="sasaran" type="hidden" name="sasaran" required value="{{ old('sasaran') }}">
            <trix-editor input="sasaran"></trix-editor>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="pb-3">
            <label for="sejarah" class="form-label">Sejarah</label>
            @error('sejarah')
              <p class="text-danger">{{ $message }}</p>
            @enderror
              <input id="sejarah" type="hidden" name="sejarah" required value="{{ old('sejarah') }}">
            <trix-editor input="sejarah"></trix-editor>
          </div>
        </div>
      </div>
      <hr>
      <div class="row pt-3">
        <div class="col-md-6">
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama_kabad') is-invalid @enderror" id="nama_kabad" name="nama_kepala_badan" placeholder="Periode" value="{{ old('nama_kepala_badan') }}">
            <label for="nama_kabad">Nama Kepala Badan</label>
            @error('nama_kabad')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="pb-3">
            <label for="foto_kabad" class="form-label" style="margin-bottom: -1px;">Foto Kepala Badan</label>
              <img src="" id="img-preview" class="img-fluid mt-1 col-sm-5 d-block">
              <input class="form-control mt-2 form-control-sm @error('foto_kabad') is-invalid @enderror" id="foto_kabad" name="foto_kepala_badan" type="file">
              @error('foto_kabad')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>          
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama_kabid_p3m') is-invalid @enderror" id="nama_kabid_p3m" placeholder="Periode" name="nama_kepalabidang_p3m" value="{{ old('nama_kepalabidang_p3m') }}">
            <label for="nama_kabid_p3m">Nama Kepala Bidang P3M</label>
            @error('nama_kabid_p3m')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="pb-3">
            <label for="foto_kabid_p3m" class="form-label" style="margin-bottom: -1px;">Foto Kepala Bidang P3M</label>
              <img src="" id="img-preview" class="img-fluid mt-1 col-sm-5 d-block">
              <input class="form-control mt-2 form-control-sm @error('foto_kabid_p3m') is-invalid @enderror" id="foto_kabid_p3m" name="foto_kepalabidang_p3m" type="file">
              @error('foto_kabid_p3m')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama_kabid_pesd') is-invalid @enderror" id="nama_kabid_pesd" placeholder="Periode" name="nama_kepalabidang_pesd" value="{{ old('nama_kepalabidang_pesd') }}">
            <label for="nama_kabid_pesd">Nama Kepala Bidang PESD</label>
            @error('nama_kabid_pesd')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="pb-3">
            <label for="foto_kabid_pesd" class="form-label" style="margin-bottom: -1px;">Foto Kepala Bidang PESD</label>
              <img src="" id="img-preview" class="img-fluid mt-1 col-sm-5 d-block">
              <input class="form-control mt-2 form-control-sm @error('foto_kabid_pesd') is-invalid @enderror" id="foto_kabid_pesd" name="foto_kepalabidang_pesd" type="file">
              @error('foto_kabid_pesd')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
        </div>  
        <div class="col-md-6">
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama_kabid_p3e') is-invalid @enderror" id="nama_kabid_p3e" placeholder="Periode" name="nama_kepalabidang_p3e" value="{{ old('nama_kepalabidang_p3e') }}">
            <label for="nama_kabid_p3e">Nama Kepala Bidang P3E</label>
            @error('nama_kabid_p3e')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="pb-3">
            <label for="foto_kabid_p3e" class="form-label" style="margin-bottom: -1px;">Foto Kepala Bidang P3E</label>
              <img src="" id="img-preview" class="img-fluid mt-1 col-sm-5 d-block">
              <input class="form-control mt-2 form-control-sm @error('foto_kabid_p3e') is-invalid @enderror" id="foto_kabid_p3e" name="foto_kepalabidang_p3e" type="file">
              @error('foto_kabid_p3e')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama_kabid_pp') is-invalid @enderror" id="nama_kabid_pp" placeholder="Periode" name="nama_kepalabidang_pp" value="{{ old('nama_kepalabidang_pp') }}">
            <label for="nama_kabid_pp">Nama Kepala Bidang PP</label>
            @error('nama_kabid_pp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="pb-3">
            <label for="foto_kabid_pp" class="form-label" style="margin-bottom: -1px;">Foto Kepala Bidang PP</label>
              <img src="" id="img-preview" class="img-fluid mt-1 col-sm-5 d-block">
              <input class="form-control mt-2 form-control-sm @error('foto_kabid_pp') is-invalid @enderror" id="foto_kabid_pp" name="foto_kepalabidang_pp" type="file">
              @error('foto_kabid_pp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama_kabid_pik') is-invalid @enderror" id="nama_kabid_pik" placeholder="Periode" name="nama_kepalabidang_pik" value="{{ old('nama_kepalabidang_pik') }}">
            <label for="nama_kabid_pik">Nama Kepala Bidang PIK</label>
            @error('nama_kabid_pik')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="pb-3">
            <label for="foto_kabid_pik" class="form-label" style="margin-bottom: -1px;">Foto Kepala Bidang PIK</label>
              <img src="" id="img-preview" class="img-fluid mt-1 col-sm-5 d-block">
              <input class="form-control mt-2 form-control-sm @error('foto_kabid_pik') is-invalid @enderror" id="foto_kabid_pik" name="foto_kepalabidang_pik" type="file">
              @error('foto_kabid_pik')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger"><a href="/dashboard/profil" class="text-decoration-none text-white">Batal</a></button>      
      </form>
    </div>
</main>

<script>
$("#gambar").change(function () {
    previewImage(this);
  });

  function previewImage(input) {
    if(input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#img-preview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection