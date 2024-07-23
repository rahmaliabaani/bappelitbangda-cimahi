@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Galeri</h3>
    </div>
    <div class="row pb-3">
      <div class="col-lg-9 pb-2">
        <a href="/dashboard/galeri/create" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tambah Data"><img src="/img/add.svg" alt="" width="25px"></a>

        <a type="button" class="delete-all" id="delete-all" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus Data"><img src="/img/delete.svg" alt="" width="25px"></a>
      </div>
      <div class="col-lg-3">
        <form action="/dashboard/galeri">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    @if (session()->has('success'))
      <div class="alert alert-success col-md-6" role="alert" id="alert-container">
        {{ session('success') }}
      </div>
    @endif

    <div class="pt-1">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th><input type="checkbox" id="select-all"></th>
            <th scope="col">#</th>
            <th scope="col">Nama Dokumentasi</th>
            <th scope="col">Kategori</th>
            <th scope="col">Tanggal Publikasi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if ($galeri->count())
          @foreach ($galeri as $gal)
          <tr id="galeri_ids{{ $gal->id }}">
            <td><input class="form-check-input" type="checkbox" name="ids" value="{{ $gal->id }}"></td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $gal->nama }}</td>
            <td>{{ $gal->kategori }}</td>
            <td>{{ $gal->publish_at }}</td>
            <td><a href="/dashboard/galeri/{{ $gal->slug }}/edit" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah Data"><img src="/img/edit.svg" alt="" width="20px"></a></td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-end">
      {{ $galeri->links() }}
    </div>

  </div>
</main>


<script src="/js/popper.min.js"></script>
<script>
// Jquery
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
      if(confirm("Yakin akan menghapus?")){
        $.ajax({
          url:"/dashboard/galeri/destroy",
          type:"DELETE",
          data:{
            ids:all_ids,
            _token:'{{ csrf_token() }}'
          },
          success:function(response){
            if(response.success) {
              $('#alert-container').removeClass('alert-danger').addClass('alert-success');
              $('#alert-container').html(response.message);
              $('#alert-container').show();
              $.each(all_ids, function(key, val) {
                $('#galeri_ids' + val).remove();
              });
            }
          }
        });
      }
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