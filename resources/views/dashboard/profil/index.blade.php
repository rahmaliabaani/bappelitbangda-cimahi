@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Profil</h3>
    </div>
    <div class="row">
      <div class="col-md-9 pb-2">
        <a href="/dashboard/profil/create" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tambah Data"><img src="/img/add.svg" alt="" width="25px"></a>
      </div>
      <div class="col-md-3">
        <form action="/dashboard/profil">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Cari.." name="cari" value="{{ request('cari') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="pt-3">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Periode</th>
            <th scope="col">Nama Kepala Badan</th>
            <th scope="col">Tanggal Publikasi</th>
            <th colspan="2">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($profil as $prof)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $prof->periode }}</td>
            <td>{{ $prof->official->nama_kepala_badan }}</td>
            <td>{{ $prof->publish_at }}</td>
            <td>
              <a href="/dashboard/profil/{{ $prof->periode }}/edit" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah Data"><img src="/img/edit.svg" alt="" width="20px"></a>
            </td>
            <td style="padding-left: 3%; padding-right: 3%;">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault" />
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
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