<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','ITSEBA')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">ITSEBA</a>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('services.index') }}">Service</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Project</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Notice</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Clients</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Staff</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact.create') }}">Contact</a></li>
      </ul>
    </div>
  </nav>

  <div class="container my-5">
    @yield('content')
  </div>

  <footer class="bg-light text-center py-4">
    &copy; {{ date('Y') }} ITSEBA
  </footer>
</body>
</html>
