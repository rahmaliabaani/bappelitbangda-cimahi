@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Kategori Informasi</h3>
    </div>
    <div class="row pb-3">
      <div class="col-lg-5 pb-2">
        <!-- Button trigger modal -->
        <span data-bs-toggle="modal" data-bs-target="#exampleModal">
          <a type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tambah Data"><img src="/img/add.svg" alt="" width="25px"></a>
        </span>
        <a type="button" class="delete-all" id="delete-all" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus Data"><img src="/img/delete.svg" alt="" width="25px"></a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Informasi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="/dashboard/kategori-informasi" method="POST">
                @csrf
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-floating">
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Kategori Informasi" required value="{{ old('nama') }}">
                      <label for="nama">Kategori Informasi</label>
                      @error('nama')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </form>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-lg-3">
        <form action="/dashboard/kategori-informasi">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success col-md-6" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="pt-1 col-lg-8">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th><input type="checkbox" id="select-all"></th>
            <th scope="col">#</th>
            <th scope="col">Kategori</th>
            <th scope="col">Tanggal Publikasi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if ($katinformasi->count())
          @foreach ($katinformasi as $katinfo)
          <tr id="katinformasi_ids{{ $katinfo->id }}">
            <td><input class="form-check-input" type="checkbox" name="ids" value="{{ $katinfo->id }}"></td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $katinfo->nama }}</td>
            <td>{{ $katinfo->created_at }}</td>
            <td><span data-bs-toggle="modal" data-bs-target="#exampleModalUpdate{{ $katinfo->slug }}">
              <a type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah Data"><img src="/img/edit.svg" alt="" width="20px"></a>
            </span></td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <!-- Modal Update-->
    @foreach ($katinformasi as $katinfo)
    <div class="modal fade" id="exampleModalUpdate{{ $katinfo->slug }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Informasi</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form action="{{ route('kategori-informasi.update', $katinfo->slug) }}" method="POST">
            @method('patch')
            @csrf
            <div class="row">
              <div class="col-md-10">
                <div class="form-floating">
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" required name="nama" placeholder="Kategori Informasi" value="{{ old('nama', $katinfo->nama) }}">
                  <label for="nama">Kategori Informasi</label>
                  @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach

    <div class="d-flex justify-content-end">
      {{ $katinformasi->links() }}
    </div>

  </div>
</main>

<script src="/js/popper.min.js"></script>
<script>
  // Jquery Hapus
  $("#select-all").click(function(e){
    $('.form-check-input').prop('checked',$(this).prop('checked'));
  });

  $('#delete-all').click(function(e) {
    e.preventDefault();
    var all_ids = [];
    $('input:checkbox[name=ids]:checked').each(function() {
      all_ids.push($(this).val());
    });
    if(all_ids.length <= 0){
      alert("Pilih minimal satu data untuk dihapus!")
    }else{
      confirm("Yakin akan menghapus?")

      $.ajax({
        url:"/dashboard/kategori-informasi/destroy",
        type:"DELETE",
        data:{
          ids:all_ids,
          _token:'{{ csrf_token() }}'
        },
        success:function(response){
          $.each(all_ids, function(key,val){
            $('#katinformasi_ids'+val).remove();
          })
        }
      });
    }
  });

  // Tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  const exampleEl = document.getElementById('example')
  const tooltip = new bootstrap.Tooltip(exampleEl, options)

</script>

</body>
</html>
@endsection