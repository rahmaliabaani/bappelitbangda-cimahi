@extends('dashboard.layouts.main')

@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
  <div class="shadow p-3 mb-5 bg-body rounded">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
      <h3>Profil</h3>
    </div>
    <div class="row pb-3">
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

    @if (session()->has('success'))
      <div class="alert alert-success col-md-6" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="pt-1">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Periode</th>
            <th scope="col">Nama Kepala Badan</th>
            <th scope="col">Tanggal Publikasi</th>
            <th colspan="2" style="">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @if ($profil->count())
          @foreach ($profil as $prof)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $prof->periode }}</td>
            <td>{{ $prof->official->nama_kepala_badan }}</td>
            <td>{{ $prof->publish_at }}</td>
            <td>
              <a href="/dashboard/profil/{{ $prof->id }}/edit" type="button" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Ubah Data"><img src="/img/edit.svg" alt="" width="20px"></a>
            </td>
            <td class="col-sm-1">
              <div class="form-check form-switch d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" role="switch" data-id="{{ $prof->id }}" {{ $prof->is_active ? 'checked' : '' }}>
              </div>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
<script src="/js/popper.min.js"></script>
<script>
  $(document).ready(function() {
            $('.form-check-input').on('change', function() {
                var id = $(this).data('id');
                var isChecked = $(this).is(':checked');
                var switchElement = $(this);

                if (isChecked) {
                    if (confirm('Yakin mengaktifkan periode ini?')) {
                        $.ajax({
                            url: "/dashboard/profil/updateStatus",
                            method: 'POST',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id,
                                is_active: true
                            },
                            success: function(response) {
                                if(response.success) {
                                    $('.form-check-input').not(switchElement).prop('checked', false); // Menonaktifkan semua switch lain
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', error); // Tampilkan pesan error di konsol
                                switchElement.prop('checked', false); // Kembalikan status switch jika AJAX gagal
                            }
                        });
                    } else {
                        switchElement.prop('checked', false); // Kembalikan status switch jika konfirmasi dibatalkan
                    }
                } else {
                    $.ajax({
                        url: "/dashboard/profil/updateStatus",
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id,
                            is_active: false
                        },
                        success: function(response) {
                            // Tangani success jika diperlukan
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', error); // Tampilkan pesan error di konsol
                            switchElement.prop('checked', true); // Kembalikan status switch jika AJAX gagal
                        }
                    });
                }
            });
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