<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BAPPELITBANGDA | {{ $title }}</title>
  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <!-- Font Family -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg p-2 fixed-top bg-light">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="/img/logoweb.png" alt="Logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse fs-5 justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Beranda') ? 'active' : '' }}" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Informasi') ? 'active' : '' }}" href="/informasi">Informasi Publik</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Dokumen') ? 'active' : '' }}" href="/dokumen">Dokumen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Berita') ? 'active' : '' }}" href="/berita">Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Profil') ? 'active' : '' }}" href="/profil">Profil</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($title === 'Galeri') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
              Galeri
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/foto">Foto</a></li>
              <li><a class="dropdown-item" href="/vidio">Vidio</a></li>
            </ul>
          </li>
        @auth
          <li class="nav-item dropdown mt-1">
            <a class="nav-link dropdown-toggle px-3 py-2 text-white fs-6 {{ ($title === 'Dashboard') ? 'active' : '' }}" style="background-color: #0D6EFD;" href="#" role="button" data-bs-toggle="dropdown">
              {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard">Dashbord Kamu</a></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item">Keluar</button>
                </form>
              </li>
            </ul>
          </li>
        @else
          <li class="nav-item mt-1">
            <a class="nav-link px-3 py-2 text-white fs-6 {{ ($title === 'Masuk') ? 'active' : '' }}" style="background-color: #0D6EFD;" href="/login">Masuk</a>
          </li>
        @endauth
        </ul>
      </div>
    </div>
  </nav>