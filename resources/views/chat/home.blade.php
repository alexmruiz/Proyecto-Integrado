<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>ChatEduConnect</title>

    <!-- Bootstrap -->
    <link href=" {{ asset('dashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href=" {{ asset('dashboard/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href=" {{ asset('dashboard/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href=" {{ asset('dashboard/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href=" {{ asset('dashboard/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <!-- JQVMap -->
    <link href=" {{ asset('dashboard/vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href=" {{ asset('dashboard/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href=" {{ asset('dashboard/build/css/custom.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    
   
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    
    <title>ChatEduConnect</title>


</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            

           

                <!-- page content -->
                <div class="chat-wrapper">
                    <div class="right_col" role="main">
                        <div class="">
                            <div class="page-title text-center"> <!-- Agrega la clase text-center para centrar el contenido -->
                                
                                <h3>CONVERSACIÓN CON {{ strtoupper($selectedUser->name) }}</h3>
                                
                            </div>
                            <div class="container">
                                <div id="main" data-user="{{ json_encode($selectedUser) }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
            
        </div>
    </div>

    



    <!-- footer content -->
    <footer>


    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <!-- jQuery -->
    <script src=" {{asset ( 'dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src=" {{asset ( 'dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src=" {{asset ( 'dashboard/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src=" {{asset ( 'dashboard/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src=" {{asset ( 'dashboard/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src=" {{asset ( 'dashboard/vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src=" {{asset ( 'dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src=" {{asset ( 'dashboard/vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src=" {{asset ( 'dashboard/vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src=" {{asset ( 'dashboard/vendors/Flot/jquery.flot.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src=" {{asset ( 'dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src=" {{asset ( 'dashboard/vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src=" {{asset ( 'dashboard/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src=" {{asset ( 'dashboard/vendors/moment/min/moment.min.js') }}"></script>
    <script src=" {{asset ( 'dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src=" {{asset ( 'dashboard/build/js/custom.min.js') }}"></script>



   

</body>

</html>
