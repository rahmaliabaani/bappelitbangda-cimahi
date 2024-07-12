  {{-- Navbar --}}
  @include('template.header')

  {{-- Isi Konten --}}
  @yield('container')

  {{-- Kontak --}}
  @include('template.kontak')
  
  {{-- Footer --}}
  @include('template.footer')