@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Galeri</h3>
    </div>
    <div class="row">
      <div class="col-md-9">
        <a href="/kelola-galeri/create" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tambah Data"><img src="/img/add.svg" alt="" width="25px"></a>
        <a href="/kelola-dokumen/delete" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus Data"><img src="/img/delete.svg" alt="" width="25px"></a>
      </div>
      <div class="col-md-3">
        <input class="form-control form-control-sm" type="text" placeholder="Cari" aria-label=".form-control-sm example">
      </div>
    </div>
    <div class="pt-3">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Dokumentasi</th>
            <th scope="col">Kategori</th>
            <th scope="col">Publish_at</th>
            <th scope="col">Aksi</th>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Lorem ipsum dolor sit amet consectetur adipisicing</td>
            <td>Foto</td>
            <td>2024-02-02</td>
            <td>
              <a href="/kelola-galeri/update" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah Data"><img src="/img/edit.svg" alt="" width="20px"></a>
            </td>
            <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  </main>

<script src="/js/popper.min.js"></script>
<script>
  // Tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

  const exampleEl = document.getElementById('example')
  const tooltip = new bootstrap.Tooltip(exampleEl, options)
</script>

</body>
</html>
@endsection