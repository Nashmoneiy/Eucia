<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'eucia') }}</title>
   
  
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->

 

  <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/css/app.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('admin/images/favicon.ico')}}" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

  
<div class="container-scroller">
    @include('includes.navbar')
<div class="container-fluid page-body-wrapper">
    @include('includes.sidebar')
<div class="main-panel">        
        <div class="content-wrapper">
            @yield('content')


        </div>
</div>

</div>
</div>



<script src="{{ asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>

  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('admin/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
  <script src="{{ asset('admin/vendors/select2/select2.min.js')}}"></script>
  <!-- End plugin js for this page-->
  <script src="{{ asset('admin/vendors/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <!-- inject:js -->
  <script src="{{ asset('admin/js/off-canvas.js')}}"></script>
  <script src="{{ asset('admin/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('admin/js/template.js')}}"></script>
  <script src="{{ asset('admin/admin/js/settings.js')}}"></script>
  <script src="{{ asset('admin/admin/js/todolist.js')}}"></script>
  <!-- endinject -->
  <script src="{{ asset('admin/js/dashboard.js')}}"></script>
    <script src="{{ asset('admin/js/proBanner.js')}}"></script>

  <!-- End custom js for this page-->
  <script src="{{ asset('admin/js/jquery.cookie.js" type="text/javascript')}}"></script>
  <!-- Custom js for this page-->
  <script src="{{ asset('admin/js/file-upload.js')}}"></script>
  <script src="{{ asset('admin/js/typeahead.js')}}"></script>
  <script src="{{ asset('admin/js/select2.js')}}"></script>

  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>



@yield('scripts')
</body>
</html>


