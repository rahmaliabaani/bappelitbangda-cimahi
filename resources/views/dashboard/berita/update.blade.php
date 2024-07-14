@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Edit Berita</h3>
    </div>
    <div class="col-lg-12">
      <form action="/dashboard/berita/{{ $berita->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
          <div class="col-md-6 pb-3">
            <div class="form-floating">
              <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" required name="judul" placeholder="Judul" value="{{ old('judul', $berita->judul) }}">
              <label for="judul">Judul</label>
              @error('judul')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pb-3">
            <div class="form-floating">
              <select class="form-select" id="kategori" name="id_kategori_berita">
                @foreach ($kategoris as $katBer)
                  @if (old('id_kategori_berita', $berita->id_kategori_berita) == $katBer->id)
                  <option value="{{ $katBer->id }}" selected>{{ $katBer->nama }}</option>
                  @else
                  <option value="{{ $katBer->id }}">{{ $katBer->nama }}</option>
                  @endif
                @endforeach
              </select>
              <label for="kategori">Pilih Kategori Berita</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pb-3">
            <div>
              <label for="gambar" class="form-label" style="margin-bottom: -5px;">Gambar Berita</label>
              <input type="hidden" name="oldImage" value="{{ $berita->gambar }}">
              @if ($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" id="img-preview" class="img-fluid mt-2 mb-3 col-sm-5 d-block">
              @else
                <img src="/img/gambar-default(1).jpg" id="img-preview" class="img-fluid mt-2 mb-3 col-sm-5 d-block">
              @endif
              <input class="form-control mt-2 form-control-sm @error('gambar') is-invalid @enderror" id="gambar" name="gambar" type="file">
              @error('gambar')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 pb-3">
            <div class="">
              <label for="deskripsi" class="form-label" style="margin-bottom: -5px;">Isi Berita</label>
              @error('deskripsi')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi', $berita->deskripsi) }}">
              <trix-editor input="deskripsi"></trix-editor>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger"><a href="/dashboard/berita" class="text-decoration-none text-white">Batal</a></button>
      </form>
    </div>
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