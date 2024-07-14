@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Tambah Dokumen</h3>
      </div>
    <form action="/dashboard/dokumen" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-lg-6">
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" required id="nama" name="nama" placeholder="Nama Dokumen" value="{{ old('nama') }}">
            <label for="nama">Nama Dokumen</label>
            @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
          <div class="form-floating pb-3">
            <select class="form-select" id="kategori" name="kategori" aria-label="Floating label select example">
              @foreach ($kategori as $kat)
                <option value="{{ $kat }}" {{ old('kategori') == $kat ? 'selected' : '' }}>
                  {{ ucfirst($kat) }}
                </option>
                @endforeach
            </select>
            <label for="floatingSelect">Pilih Kategori Dokumen</label>
          </div>
          <div class="pb-3">
            <label for="dokumen" class="form-label" style="margin-bottom: -5px;">Dokumen</label>
              <input class="form-control mt-2 form-control-sm @error('dokumen') is-invalid @enderror" required id="dokumen" name="dokumen" type="file" value="{{ old('dokumen') }}">
              @error('dokumen')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger"><a href="/dashboard/dokumen" class="text-decoration-none text-white">Batal</a></button>
    </form>
    </div>
  </main>
@endsection