
@extends('layout.master')
@section('isi')
<body class="starter-page-page bg-light">

<main class="main">

  <!-- Page Title -->
  <div class="page-title py-4 bg-success text-white shadow-sm">
    <div class="container text-center">
      <h1 class="display-5 fw-bold">Login</h1>
      <p class="mb-0">Silakan masuk untuk mengakses sistem Penjualan Pupuk.</p>
    </div>
  </div><!-- End Page Title -->

  <!-- Login Form Section -->
  @if ($errors->any())
      <div class="alert alert-danger container mt-3">
          {{ $errors->first() }}
      </div>
  @endif

  <section id="login-section" class="section py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4">
              <h4 class="card-title mb-4 text-center text-success">Masuk ke Akun Anda</h4>
              <form method="POST" action="{{ route('kirimdata') }}">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control rounded-pill" name="email" id="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Kata Sandi</label>
                  <input type="password" class="form-control rounded-pill" name="password" id="password" placeholder="••••••••" required>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-success rounded-pill">Masuk</button>
                </div>
              </form>
              <div class="mt-3 text-center">
                <small>Belum punya akun? <a href="{{ route('regis') }}" class="text-success fw-semibold">Daftar di sini</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
</body>
@endsection