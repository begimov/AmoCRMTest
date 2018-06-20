<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('layouts.partials._head')
</head>
<body class="bg-light">
  <div id="app">
    <div v-cloak>
      @yield('content')
    </div>
  </div>
  @include ('layouts.partials._scripts')
  <script>
    jQuery(document).ready(function() {
      @yield('postJquery');
    });
  </script>
</body>
</html>