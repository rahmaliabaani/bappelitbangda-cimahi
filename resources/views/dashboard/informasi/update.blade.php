@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Edit Informasi Publik</h3>
    </div>
    <div class="col-lg-12">
      <form action="/dashboard/informasi/{{ $informasi->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
          <div class="col-md-6 pb-3">
            <div class="form-floating">
              <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" required name="judul" placeholder="Judul" value="{{ old('judul', $informasi->judul) }}">
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
              <select class="form-select" id="kategori" name="id_kategori_informasi">
                @foreach ($kategoris as $katInfo)
                  @if (old('id_kategori_informasi', $informasi->id_kategori_informasi) == $katInfo->id)
                  <option value="{{ $katInfo->id }}" selected>{{ $katInfo->nama }}</option>
                  @else
                  <option value="{{ $katInfo->id }}">{{ $katInfo->nama }}</option>
                  @endif
                @endforeach
              </select>
              <label for="kategori">Pilih Kategori Informasi</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pb-3">
            <div>
              <label for="gambar" class="form-label" style="margin-bottom: -5px;">Gambar Informasi</label>
              <input type="hidden" name="oldImage" value="{{ $informasi->gambar }}">
              @if ($informasi->gambar)
                <img src="{{ asset('storage/' . $informasi->gambar) }}" id="img-preview" class="img-fluid mt-2 mb-3 col-sm-5 d-block">
              @else
                <img src="" id="img-preview" class="img-fluid mt-2 mb-3 col-sm-5 d-block">
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
              <label for="deskripsi" class="form-label" style="margin-bottom: -5px;">Isi Informasi</label>
              @error('deskripsi')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi', $informasi->deskripsi) }}">
              <trix-editor input="deskripsi"></trix-editor>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <button type="button" class="btn btn-danger"><a href="/dashboard/informasi" class="text-decoration-none text-white">Batal</a></button>
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