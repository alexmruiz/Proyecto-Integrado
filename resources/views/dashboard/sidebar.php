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
                   
                </div>
            </div>
            <!-- /top navigation -->