<!DOCTYPE html>
<html lang="en">

<head>
  @include('bagian.header')
</head>

<body class="index-page">
  <main>
    @yield('isi')
  </main>

  @stack('scripts')
</body>

</html>