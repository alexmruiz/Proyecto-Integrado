
@extends('dashboard.app')

@section('title', 'Página de Inicio')

@section('content')
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Mis cursos</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="x_panel">
                            <div class="x_content">
                                <div class="col-md-12 col-sm-12  text-center">
                                    <ul class="pagination pagination-split">
                                        <li><a href="#">A</a></li>
                                        <li><a href="#">B</a></li>
                                        <li><a href="#">C</a></li>
                                        <li><a href="#">D</a></li>
                                        <li><a href="#">E</a></li>
                                        <li>...</li>
                                        <li><a href="#">W</a></li>
                                        <li><a href="#">X</a></li>
                                        <li><a href="#">Y</a></li>
                                        <li><a href="#">Z</a></li>
                                    </ul>
                                </div>

                                <div class="clearfix"></div>


                                @foreach ($teachers as $teacher)
                                    <div class="col-md-4 col-sm-4 profile_details">
                                        <div class="well profile_view">
                                            <div class="col-sm-12">
                                                <h4 class="brief">
                                                    <i>
                                                        @foreach ($teacher->subjects as $subject)
                                                            {{ $subject->name }} ({{ $subject->level }})
                                                            @unless ($loop->last)
                                                                ,
                                                            @endunless
                                                        @endforeach
                                                    </i>
                                                </h4>
                                                <div class="left col-md-7 col-sm-7">
                                                    <h2>{{ $teacher->name }}</h2>
                                                    <p><strong>Descripción: </strong>{{ $teacher->about }}</p>
                                                    <ul class="list-unstyled">       
                                                        <li><i class="fa fa-phone"></i> Teléfono:
                                                            {{ $teacher->phone }}</li>
                                                    </ul>
                                                </div>
                                                <div class="right col-md-5 col-sm-5 text-center">
                                                    @if (!empty($teacher->profile_picture))
                                                        <img src="{{ asset($teacher->profile_picture) }}"
                                                            alt="" class="img-circle img-fluid">
                                                    @else
                                                        <img src="{{ asset('uploads/avatar.jpg') }}" alt="Avatar"
                                                            class="img-circle img-fluid">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="profile-bottom text-center">
                                                <div class="col-sm-6 emphasis">
                                                    <p class="ratings">
                                                        <a>{{ $teacher->rating }}</a>
                                                        <span class="fa fa-star"></span>
                                                    </p>
                                                </div>
                                                <div class="col-sm-6 emphasis">
                                                    <a href="{{ route('conversation', ['userId' => $teacher->id]) }}" class="btn btn-success btn-sm">
                                                        <i class="fa fa-user"></i> <i class="fa fa-comments-o"></i>
                                                    </a>
                                                    <a href="{{ url('/teacher/' . $teacher->id . '/calendar') }}">
                                                        <button type="button" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach






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

   
  



 
    </div>
    </div>
    @endsection
    