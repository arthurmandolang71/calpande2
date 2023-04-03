<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="vertical-menu-template"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Fitur Aplikasi Rahasia Kemanangan</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/css/rtl/theme-raspberry.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/select2/select2.css" />

    
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
    <link rel="stylesheet" href="{{ asset('') }}assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
 
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('') }}assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('') }}assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('') }}assets/js/config.js"></script>

    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>

    <style>
      .page-loader{
            width: 100%;
            height: 100vh;
            position: absolute;
            background: #272727;
            z-index: 1000;
            .txt{
                color: #666;
                text-align: center;
                top: 40%;
                position: relative;
                text-transform: uppercase;
                letter-spacing: 0.3rem;
                font-weight: bold;
                line-height: 1.5;
            }
        }

        /* Spinner animation */
        .spinner {
          position: relative;
          top: 35%;
          width: 80px;
          height: 80px;
          margin: 0 auto;
          background-color: #fff;
          border-radius: 100%;  
          -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
          animation: sk-scaleout 1.0s infinite ease-in-out;
        }

        @-webkit-keyframes sk-scaleout {
          0% { -webkit-transform: scale(0) }
          100% {
            -webkit-transform: scale(1.0);
            opacity: 0;
          }
        }

        @keyframes sk-scaleout {
          0% { 
            -webkit-transform: scale(0);
            transform: scale(0);
          } 100% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
            opacity: 0;
          }
        }
    </style>
  </head>

  <body onload="hideLoader()">

    <div class="page-loader">
      <div class="spinner"></div>
      <div class="txt">Loading...</div>
    </div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">  <!-- Layout container -->

        <!-- Menu -->
          @include('dashboard.part.menu')
        <!-- / Menu -->

        
        <div class="layout-page"><!-- Layout page -->

        <!-- Navbar -->
          @include('dashboard.part.navbar')
        <!-- / Navbar -->

          
          <div class="content-wrapper"><!-- Content wrapper -->
            

            <!--  Content -->
              @yield('content')
            <!-- / Content -->

            <!-- Footer -->
              @include('dashboard.part.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div> <!-- Content wrapper -->
         
        </div>  <!-- / Layout page -->
       
      </div> <!-- Layout container -->

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>


    </div> <!-- / Layout wrapper -->
    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    {{-- <script src="{{ asset('') }}assets/vendor/libs/jquery/jquery.js"></script> --}}
   
    <script src="{{ asset('') }}assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('') }}assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="{{ asset('') }}assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="{{ asset('') }}assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('') }}assets/js/main.js"></script>

    <!-- Page JS -->

    <script src="{{ asset('assets/js/jquery.chained.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.chained.remote.js') }}"></script>

    <script src="{{ asset('') }}assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    {{-- <script src="{{ asset('') }}assets/js/tables-datatables-basic.js"></script> --}}
 
    <script>
      function hideLoader(){
        $('.page-loader').fadeOut('slow');
      }
    </script>

  </body>
</html>
