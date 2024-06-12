@extends('dashboard.app')

@section('title', 'Página de Inicio')

@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Mis alumnos</h3>
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

                                <div class="clearfix"><h4>Mis alumnos</h4></div>


                               






                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            @endsection

            
     