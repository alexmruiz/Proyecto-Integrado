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
   

    <link href="https://fonts.googleapis.com/css?family=Baloo+2|PT+Sans&display=swap" rel="stylesheet">
    

    
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <link rel="stylesheet" href=" {{ asset ('dashboard/build/css/styles.css') }}">
    <script src=" {{ asset ('dashboard/build/js/scripts.js') }}"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <title>ChatEduConnect</title>


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
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    @if (Auth::check())
                                        @if (!empty(Auth::user()->profile_picture))
                                            <img src="{{ asset(auth()->user()->profile_picture) }}"alt="">
                                        @else
                                            <img src="{{ asset('uploads/avatar.jpg') }}" alt="Avatar"
                                                class="img-circle profile_img">
                                        @endif

                                        {{ Auth::user()->name }}</p>
                                    @endif
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}"> Profile</a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">Help</a>
                                    <a class="dropdown-item" href="login.html"><i
                                            class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>

                            <li role="presentation" class="nav-item dropdown open">
                                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                    aria-labelledby="navbarDropdown1">
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item">
                                            <span class="image"><img src="images/img.jpg"
                                                    alt="Profile Image" /></span>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were
                                                where...
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <div class="text-center">
                                            <a class="dropdown-item">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="chat-wrapper">
              
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>CONVERSACIÓN CON {{ $selectedUser->name }}</h3>
                            </div>
                        </div>
                        <div class="chat-container">
                            <div class="messages" id="messages"></div>
                            <div class="input-container">
                                <input type="text" id="messageInput" placeholder="Escribe un mensaje...">
                                <button id="sendButton">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

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



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>
