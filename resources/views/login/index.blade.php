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

<style>
    body {
        background-color: #0D6EFD;
    }
    .btn-oren {
        background-color: #EC6E13;
    }
    .btn-oren:hover {
        background-color: #d35e0b;
    }
    .pt-10 {
        padding-top: 8rem;
    }

</style>

<body>

<div class="row w-100 d-flex justify-content-center pt-10 m-auto">
    <div class="col-lg-4 text-center">
        <img src="/img/logoweb2.png" alt="Logo Bappelitbangda" class="img-fluid pb-3" width="300px">
        <h5 class="text-white fw-normal pb-3">Selamat Datang!</h5>
        
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/login" method="POST" class="text-start">
            {{-- setiap membuat form gunakan csrf untuk pengamanan form --}}
            @csrf 
            <div class="form-floating pb-3">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating pb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn btn-oren text-white">Masuk</button>
        </form>
    </div>
</div>

<!-- JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>