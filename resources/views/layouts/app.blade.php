<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="//cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" />

  <style>
    [v-cloak] {
      display: none;
    }
  </style>
  @yield('head')
</head>
<body style="padding-bottom: 100px;">
<div id="app">
  @include('layouts._nav')
  <main class="py-4">
    @yield('content')
  </main>
  <flash message="{{ session('flash') }}"></flash>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
