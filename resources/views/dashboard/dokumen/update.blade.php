@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
    <div class="shadow p-3 mb-5 bg-body rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h3>Edit Dokumen</h3>
      </div>
    <form action="/dashboard/dokumen/{{ $dokumen->slug }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
      <div class="row">
        <div class="col-lg-6">
          <div class="form-floating pb-3">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" required id="nama" name="nama" placeholder="Nama Dokumen" value="{{ old('dokumen', $dokumen->nama) }}">
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
                <option value="{{ $kat }}" {{ old('kategori', $dokumen->kategori) == $kat ? 'selected' : '' }}>
                  {{ ucfirst($kat) }}
                </option>
                @endforeach
            </select>
            <label for="floatingSelect">Pilih Kategori Dokumen</label>
          </div>
          <div class="pb-3">
            <label for="dokumen" class="form-label" style="margin-bottom: -5px;">Dokumen</label>
              <input class="form-control mt-2 form-control-sm" id="dokumen" name="dokumen" type="file">
							{{-- <input type="hidden" name="oldFile" value="{{ $dokumen->dokumen }}"> --}}
							@if ($dokumen->dokumen)
								<div class="form-group pb-3">
									<label>Dokumen Saat ini</label>
										<a href="{{ asset('storage/' . $dokumen->dokumen) }}" name="oldFile" target="_blank">Lihat Dokumen</a>
								</div>
							@endif
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <button type="button" class="btn btn-danger"><a href="/dashboard/dokumen" class="text-decoration-none text-white">Batal</a></button>
    </form>
    </div>
  </main>
@endsection