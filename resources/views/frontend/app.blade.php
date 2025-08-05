<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- External CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />
    <!-- Font Awesome CDN  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
      integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" />
    <title>Hospital Information Management System</title>
  </head>
  <body>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
    @stack('scripts')
  </body>
</html>
