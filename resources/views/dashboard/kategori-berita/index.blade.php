@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Kategori Berita</h3>
    </div>
    <div class="row">
      <div class="col-md-9">
        <!-- Button trigger modal -->
        <span data-bs-toggle="modal" data-bs-target="#exampleModal">
          <a type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tambah Data"><img src="/img/add.svg" alt="" width="25px"></a>
        </span>
        <a href="/kelola-kategoriinformasi/delete" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Hapus Data"><img src="/img/delete.svg" alt="" width="25px"></a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori Berita</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-10">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="kategoriinformasi" placeholder="Kategori Informasi">
                      <label for="kategoriinformasi">Kategori Berita</label>
                    </div>
                    <div class="form-floating mt-3">
                      <input type="text" class="form-control" id="slug" placeholder="Slug">
                      <label for="slug">Slug</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </div>
            </div>
          </div>
        </div>

        
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
            <th scope="col">Kategori</th>
            <th scope="col">Publish_at</th>
            <th scope="col">Aksi</th>
            <th scope="col">#</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Lorem ipsum dolor sit amet</td>
            <td>2024-02-02</td>
            <td>
              <a href="/kelola-dokumen/update" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah Data"><img src="/img/edit.svg" alt="" width="20px"></a>
            </td>
            <td><input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="..."></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  </main>

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