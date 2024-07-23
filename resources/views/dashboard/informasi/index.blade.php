@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Informasi Publik</h3>
    </div>
    <div class="row pb-3">
      <div class="col-lg-9 pb-2">
        <a href="/dashboard/informasi/create" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tambah Data"><img src="/img/add.svg" alt="" width="25px"></a>
        
        <a type="button" class="delete-all" id="delete-all" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus Data"><img src="/img/delete.svg" alt="" width="25px"></a>
      </div>
      <div class="col-lg-3">
        <form action="/dashboard/informasi">
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
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Tanggal Publikasi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if ($informasi->count())
          @foreach ($informasi as $info)
          <tr id="informasi_ids{{ $info->id }}">
            <td><input class="form-check-input" type="checkbox" name="ids" value="{{ $info->id }}"></td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $info->judul }}</td>
            <td>{{ $info->kategoriInformasi->nama }}</td>
            <td>{{ $info->publish_at }}</td>
            <td><a href="/dashboard/informasi/{{ $info->slug }}/edit" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah Data"><img src="/img/edit.svg" alt="" width="20px"></a></td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-end">
      {{ $informasi->links() }}
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
      if(confirm("Yakin akan menghapus?")) {
        $.ajax({
          url:"/dashboard/informasi/destroy",
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
                $('#informasi_ids' + val).remove();
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