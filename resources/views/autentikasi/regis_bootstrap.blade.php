<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .card {
      border: none;
      background-color: #fff;
      transition: transform 0.2s ease-in-out;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .form-control {
      border-radius: 0.5rem;
    }

    .form-control:focus {
      border-color: #28a745;
      box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .btn-success {
      border-radius: 0.5rem;
      font-weight: bold;
    }

    .page-title .heading {
      background: linear-gradient(135deg, #28a745, #218838);
      color: #fff;
      padding: 1rem 0;
      border-radius: 0 0 2rem 2rem;
    }

    .page-title h1 {
      font-size: 2.5rem;
      font-weight: bold;
    }

    .page-title p {
      font-size: 1.1rem;
    }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <main class="main">
    <!-- Page Title -->
    <div class="page-title">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Daftar Akun</h1>
              <p class="mb-0">Buat akun Anda dan mulailah memasarkan pupuk hasil produksi sendiri atau temukan pupuk berkualitas dari penjual terpercaya</p>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Page Title -->

    <!-- Register Form Section -->
    <section id="register-section" class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card p-4 shadow rounded">
              <form method="POST" action="{{ route('kirim') }}">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Alamat Email</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Kata Sandi</label>
                  <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Daftar</button>
                <div class="text-center mt-3">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Register Form Section -->

    </main>
</body>
</html>