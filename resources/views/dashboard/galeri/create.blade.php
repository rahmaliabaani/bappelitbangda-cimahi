@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Tambah Galeri</h3>
      </div>

      <form action="/dashboard/galeri" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-6">
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Dokumentasi" required value="{{ old('nama') }}">
            <label for="nama">Nama Dokumentasi</label>
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating pb-3">
            <select class="form-select" id="kategori" name="kategori" onchange="updateInputField()">
                <option value="">Pilih Kategori</option>  
              @foreach ($kategori as $kat)
                <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>
                  {{ ucfirst($kat) }}
                </option>
              @endforeach
            </select>
            <label for="floatingSelect">Pilih Kategori Galeri</label>
          </div>
          <div id="inputField" class="pb-3"></div>
          {{-- <p>Isi Salah Satu Dibawah ini Sesuai Kategori yang Terpilih!</p>
          @if ($selectedKategori == 'Foto')
            <div class="pb-3">
              <label for="gambar" class="form-label" style="margin-bottom: -5px;">Foto</label> --}}
              {{-- <img src="" id="img-preview" class="img-fluid col-sm-5 d-block"> --}}
              {{-- <input class="form-control mt-2 form-control-sm @error('gambar') is-invalid @enderror" id="gambar" name="gambar" type="file" value="{{ old('gambar') }}">
                @error('gambar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div> --}}
          {{-- @elseif ($selectedKategori == 'Vidio')
            <div class="pb-3">
              <label for="link_vidio" class="form-label" style="margin-bottom: -5px;">Link Vidio</label>
              <input class="form-control mt-2 form-control-sm @error('link_vidio') is-invalid @enderror" id="link_vidio" name="link_vidio" type="url" value="{{ old('link_vidio') }}">
                @error('link_vidio')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
          @endif--}}
        </div> 
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger"><a href="/dashboard/galeri" class="text-decoration-none text-white">Batal</a></button>
    </form>
    </div>
</main>
@endsection

<script>
  function updateInputField() {
    const category = document.getElementById('kategori').value;
    const inputField = document.getElementById('inputField');
    if (category === 'Foto') {
      inputField.innerHTML = `
        <label for="gambar" class="form-label" style="margin-bottom: -5px;">Foto</label>
        <input class="form-control mt-2 form-control-sm @error('gambar') is-invalid @enderror" id="gambar" name="gambar" type="file" value="{{ old('gambar') }}">
          @error('gambar')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror`;
    } else if (category === 'Vidio') {
      inputField.innerHTML = `
        <label for="link_vidio" class="form-label" style="margin-bottom: -5px;">Link Vidio</label>
        <input class="form-control mt-2 form-control-sm @error('link_vidio') is-invalid @enderror" id="link_vidio" name="link_vidio" type="url" value="{{ old('link_vidio') }}">
          @error('link_vidio')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror`;
    } else {
      inputField.innerHTML = ``;
    }
  }

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
</script>