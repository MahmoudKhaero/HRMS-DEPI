<!doctype html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home page</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- AOS Animation CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.css" />

<!-- Custom CSS -->
<style>
  .hero-section {
    background: linear-gradient(180deg, rgba(0,0,0,0.5), rgba(0,0,0,0.5));
    color: white;
    margin: -25px 0 0 0;
  }
  .job-card:hover {
    transform: scale(1.05);
    transition: 0.3s ease-in-out;
  }
  .process-step {
    text-align: center;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
  }
  .text-highlight {
    color: #00b4d8;
  }
</style>

    

    @yield('head')
</head>
<body>
    <div id="app">
        @yield('nav')
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="text-center my-3 text-muted">
            Copyright &copy; 2024 DEPI. All rights reserved.
        </footer>
    </div>
    @yield('script')
</body>
<script src="https://cdn.jsdelivr.net/npm/aos@next/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
