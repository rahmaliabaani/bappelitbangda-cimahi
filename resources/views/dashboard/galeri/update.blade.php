@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Edit Galeri</h3>
      </div>

      <form action="/dashboard/galeri/{{ $galeris->slug }}" method="POST" enctype="multipart/form-data">
      @method('put')
        @csrf
      <div class="row">
        <div class="col-lg-6">
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Dokumentasi" required value="{{ old('nama', $galeris->nama) }}">
            <label for="nama">Nama Dokumentasi</label>
            @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating pb-3">
            <select class="form-select" id="kategori" name="kategori" >
              @foreach ($kategori as $kat)
                <option value="{{ $kat }}" {{ old('kategori', $galeris->kategori) == $kat ? 'selected' : '' }}>
                  {{ ucfirst($kat) }}
                </option>
              @endforeach
            </select>
            <label for="floatingSelect">Pilih Kategori Galeri</label>
          </div>
          @if (old('kategori', $galeris->kategori) == 'Foto')
            <div class="pb-3">
              <label for="gambar" class="form-label" style="margin-bottom: -5px;">Foto</label>
              <input type="hidden" name="oldImage" value="{{ $galeris->gambar }}">
              @if ($galeris->gambar)
                <img src="{{ asset('storage/' . $galeris->gambar) }}" id="img-preview" class="img-fluid mt-2 mb-3 col-sm-5 d-block">
              @endif
              <input class="form-control mt-2 form-control-sm @error('gambar') is-invalid @enderror" id="gambar" name="gambar" type="file" value="{{ old('gambar', $galeris->gambar) }}">
                @error('gambar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
          @elseif (old('kategori', $galeris->kategori) == 'Vidio')
            <div class="pb-3">
              <label for="link_vidio" class="form-label" style="margin-bottom: -5px;">Link Vidio</label>
              <input class="form-control mt-2 form-control-sm @error('link_vidio') is-invalid @enderror" id="link_vidio" name="link_vidio" type="text" value="{{ old('link_vidio', $galeris->link_vidio) }}">
                @error('link_vidio')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
            </div>
          @endif
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger"><a href="/dashboard/galeri" class="text-decoration-none text-white">Batal</a></button>
    </form>
    </div>
</main>
@endsection

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
</script>