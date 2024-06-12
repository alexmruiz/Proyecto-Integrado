<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @yield('styles')
    <!-- Bootstrap -->
    <link href=" {{ asset('dashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href=" {{ asset('dashboard/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    {{--<link rel="stylesheet" href=" {{ asset ('dashboard/build/css/styles.css') }}">--}}
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

    
    
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><span>EduConnect</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        @if (Auth::check())

                            <div class="profile_pic">
                                @if (!empty(Auth::user()->profile_picture))
                                    <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Image"
                                        class="img-circle profile_img">
                                @else
                                    <img src="{{ asset('uploads/avatar.jpg') }}" alt="Avatar" class="img-circle profile_img">
                                @endif
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>
                                    <p> {{ Auth::user()->name }}</p>
                                </h2>
                            </div>
                        @endif
                    </div>
                    <!-- /menu profile quick info -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <br />
                    @if(Auth::check())
                    @if(Auth::user()->rol === 'student')
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Mis cursos <span
                                            class="label label-success pull-right"></span></a>

                                <li><a href="{{ route('calendar') }}"><i class="fa fa-calendar"></i> Calendario <span
                                            class="label label-success pull-right"></span></a></li>

                                <li><a><i class="fa fa-mortar-board"></i> Calificaciones <span
                                            class="label label-success pull-right"></span></a></li>


                                <li><a href="{{ route('show.chat') }}"><i class="fa fa-comment-o"></i> Chat<span
                                            class="label label-success pull-right"></span></a></li>


                                <li><a><i class="fa fa-tasks"></i>Tareas <span
                                            class="label label-success pull-right"></span></a></li>

                                <li><a href="{{ route('show.teacher') }}"><i class="fa fa-search"></i>Nuevos profesores <span
                                            class="label label-success pull-right"></span></a></li>
                                <li><a><i class="fa fa-bank"></i>Secretaria <span
                                            class="label label-success pull-right"></span></a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                    @else
                        <!-- sidebar menu -->
                   <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="{{ route('star.teacher')}}"><i class="fa fa-home"></i> Mis alumnos <span
                                        class="label label-success pull-right"></span></a>

                            <li><a href="{{ route('calendar') }}"><i class="fa fa-calendar"></i> Calendario <span
                                        class="label label-success pull-right"></span></a></li>

                            


                            <li><a href="{{ route('show.chat') }}"><i class="fa fa-comment-o"></i> Chat<span
                                        class="label label-success pull-right"></span></a></li>


                            
                            <li><a><i class="fa fa-bank"></i>Secretaria <span
                                        class="label label-success pull-right"></span></a></li>

                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
                @endif
                @endif
                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

             <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href=" {{ route ('profile')}}"> Perfil</a>
                        
                    </div>
                  </li>
  
                  
                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->

           

            @yield('content')



    <script src=" {{ asset ('dashboard/build/js/scripts.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

            <!-- jQuery -->
    <script src=" {{ 'dashboard/vendors/jquery/dist/jquery.min.js' }}"></script>
    <!-- Bootstrap -->
    <script src=" {{ 'dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js' }}"></script>
    <!-- FastClick -->
    <script src=" {{ 'dashboard/vendors/fastclick/lib/fastclick.js' }}"></script>
    <!-- NProgress -->
    <script src=" {{ 'dashboard/vendors/nprogress/nprogress.js' }}"></script>
    <!-- Chart.js -->
    <script src=" {{ 'dashboard/vendors/Chart.js/dist/Chart.min.js' }}"></script>
    <!-- gauge.js -->
    <script src=" {{ 'dashboard/vendors/gauge.js/dist/gauge.min.js' }}"></script>
    <!-- bootstrap-progressbar -->
    <script src=" {{ 'dashboard/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js' }}"></script>
    <!-- iCheck -->
    <script src=" {{ 'dashboard/vendors/iCheck/icheck.min.js' }}"></script>
    <!-- Skycons -->
    <script src=" {{ 'dashboard/vendors/skycons/skycons.js' }}"></script>
    <!-- Flot -->
    <script src=" {{ 'dashboard/vendors/Flot/jquery.flot.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/Flot/jquery.flot.pie.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/Flot/jquery.flot.time.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/Flot/jquery.flot.stack.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/Flot/jquery.flot.resize.js' }}"></script>
    <!-- Flot plugins -->
    <script src=" {{ 'dashboard/vendors/flot.orderbars/js/jquery.flot.orderBars.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/flot-spline/js/jquery.flot.spline.min.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/flot.curvedlines/curvedLines.js' }}"></script>
    <!-- DateJS -->
    <script src=" {{ 'dashboard/vendors/DateJS/build/date.js' }}"></script>
    <!-- JQVMap -->
    <script src=" {{ 'dashboard/vendors/jqvmap/dist/jquery.vmap.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/jqvmap/dist/maps/jquery.vmap.world.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js' }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src=" {{ 'dashboard/vendors/moment/min/moment.min.js' }}"></script>
    <script src=" {{ 'dashboard/vendors/bootstrap-daterangepicker/daterangepicker.js' }}"></script>

    <!-- Custom Theme Scripts -->
    <script src=" {{ 'dashboard/build/js/custom.min.js' }}"></script>

</body>

</html>
