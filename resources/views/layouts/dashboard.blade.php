<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard | {{ $data['title'] }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{ asset('niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <link href="{{ asset('niceadmin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
  @include('layouts.partials.header')
  
  @include('layouts.partials.sidebar')
  
  <main id="main" class="main">
    @include('layouts.partials.alert')

    @yield('content')
  </main>

  @include('layouts.partials.footer')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    const BASEURL = 'http://127.0.0.1:8000/';
  </script>
  
  <script src="{{ asset('niceadmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/php-email-form/validate.js') }}"></script>

  <script src="{{ asset('niceadmin/assets/js/main.js') }}"></script>

  @yield('script')

</body>

</html>