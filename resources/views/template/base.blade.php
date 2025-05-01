
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | E-Library</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('purple/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('purple/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('purple/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('purple/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('purple/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('purple/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('purple/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('purple/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
     
      <!-- navbar -->
     @include('template.includes.navbar')
      <!-- end navbar -->

      <!-- sidebar -->
      <div class="container-fluid page-body-wrapper">
        <!-- sidebar -->
        @include('template.includes.sidebar')
         <!-- end sidebar -->

        <!-- main -->
        @yield('content')
        <!-- main ends -->
      </div>

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    <!-- plugins:js -->
    <script src="{{ asset('purple/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('purple/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('purple/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('purple/js/off-canvas.js')}}"></script>
    <script src="{{ asset('purple/js/misc.js')}}"></script>
    <script src="{{ asset('purple/js/settings.js')}}"></script>
    <script src="{{ asset('purple/js/todolist.js')}}"></script>
    <script src="{{ asset('purple/js/jquery.cookie.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('purple/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->

  <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
</html>