@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Tambah Akun Staf Sekretariat</h3>
    </div>
    <div class="col-lg-12">
      <form action="/admin/staf" method="POST">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <div class="form-floating pb-3">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" required name="name" placeholder="name" value="{{ old('name') }}">
              <label for="name">Nama Lengkap</label>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating pb-3">
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" required name="username" placeholder="username" value="{{ old('username') }}">
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating pb-3">
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" required name="email" placeholder="email" value="{{ old('email') }}">
							<label for="email">Email</label>
							@error('email')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
						<div class="form-floating pb-3">
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" required name="password" placeholder="password" value="{{ old('password') }}">
							<label for="password">Password</label>
							@error('password')
								<div class="invalid-feedback">
									{{ $message }}
								</div>
							@enderror
						</div>
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-danger"><a href="/admin/staf" class="text-decoration-none text-white">Batal</a></button>
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