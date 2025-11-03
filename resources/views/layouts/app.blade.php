<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- =========================
      META & TITLE
    ========================== --}}
    <title>@yield('title', 'Tableau de bord')</title>

    {{-- =========================
         CSS PRINCIPAL
    ========================== --}}
    <!-- Core CSS -->
   
    <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}"> -->

    <!-- Icons & Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">

    <!-- Layout Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/style.css') }}">
      
    <link rel="stylesheet" href="{{ asset('assets/vendors/simplemde/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
     <!-- DataTables -->
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/demo_2/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/buttons.bootstrap4.min.css') }}"> -->

    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/demo_2/core.css') }}">
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    
   
    @stack('styles')
</head>

<body>
    <div class="main-wrapper">
        
        @include('cert.body.sidebar')

        <div class="page-wrapper">
           
            @include('cert.body.navbar')

            
            <div class="page-content">
              
                @yield('content')
            </div>

            
            @include('cert.body.footer')
        </div>
    </div>


  

    <!-- Core JS -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
 
 
    

    <!-- Charts & Plugins -->
    <!-- <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script> -->
    <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
 

    <!-- <script src="{{ asset('assets/vendors/simplemde/simplemde.min.js') }}"></script> -->
    <script src="{{ asset('assets/js/tinymce.js') }}"></script>
    <!-- <script src="{{ asset('assets/js/simplemde.js') }}"></script>
    <script src="{{ asset('assets/js/ace.js') }}"></script>
    <script src="{{ asset('assets/vendors/ace-builds/src-min/ace.js') }}"></script> -->
    
  

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
   
    <!-- Template Core JS -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>


    {{-- Scripts additionnels spécifiques à une page --}}
    @stack('scripts')
</body>
</html>
