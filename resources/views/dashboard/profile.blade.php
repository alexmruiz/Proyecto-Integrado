@extends('dashboard.app')

@section('title', 'Perfil')

@section('content')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Perfil de usuario</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_title">
                                    
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-3 col-sm-3  profile_left">
                                        <div class="sidebar-section">
                                            <div class="sidebar-section-body text-center pt-0">




                                                <div class="sidebar-section-body text-center pt-0">
                                                    <div class="card-img-actions d-inline-block mb-3">
                                                        <!-- Botón personalizado para seleccionar la foto -->
                                                        <label for="profilePictureInput"
                                                            class="btn btn-outline-white btn-icon rounded-pill">
                                                            @if (!empty(Auth::user()->profile_picture))
                                                                <img src="{{ asset(Auth::user()->profile_picture) }}"
                                                                    alt="Profile Picture" class="rounded-circle"
                                                                    style="width: 150px; height: 150px;">
                                                            @else
                                                                <img src="{{ asset('uploads/avatar.jpg') }}"
                                                                    alt="Avatar" class="rounded-circle"
                                                                    style="width: 100px; height: 100px;">
                                                            @endif
                                                            <div class="d-flex align-items-center justify-content-center"
                                                                style="width: 100px; height: 100px; position: absolute; top: 0; left: 0;">
                                                                <div>Seleccionar foto</div>
                                                            </div>
                                                        </label>
                                                        <!-- Input de tipo archivo oculto -->
                                                        <form id="uploadForm" action="{{ route('updateProfile') }}"
                                                            method="POST" enctype="multipart/form-data"
                                                            style="display: none;">
                                                            @csrf
                                                            <input type="file" name="profile_picture"
                                                                id="profilePictureInput"
                                                                onchange="document.getElementById('uploadForm').submit();">
                                                        </form>
                                                        <!-- Botón de lápiz para indicar que se puede cambiar la imagen -->
                                                        <div class="card-img-actions-overlay card-img rounded-circle position-absolute top-0 start-0 w-100 h-100"
                                                            style="display: flex; justify-content: center; align-items: center;">
                                                            <button type="button"
                                                                class="btn btn-outline-white btn-icon rounded-pill"
                                                                onclick="document.getElementById('profilePictureInput').click();">
                                                                <i class="ph-pencil"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-center mt-3">
                                                    <a href="#" class="link-pink" data-bs-popup="tooltip"
                                                        title="Dribbble">
                                                        <i class="ph-dribbble-logo"></i>
                                                    </a>
                                                    <a href="#" class="link-info mx-2" data-bs-popup="tooltip"
                                                        title="Twitter">
                                                        <i class="ph-twitter-logo"></i>
                                                    </a>
                                                    <a href="#" class="link-indigo" data-bs-popup="tooltip"
                                                        title="Teams">
                                                        <i class="ph-microsoft-teams-logo"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>





                                        <h3> {{ Auth::user()->name }}</h3>

                                        <ul class="list-unstyled user_data">
                                            <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco,
                                                California, USA
                                            </li>

                                            <li>
                                                <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                                            </li>

                                            <li class="m-top-xs">
                                                <i class="fa fa-external-link user-profile-icon"></i>
                                                <a href="http://www.kimlabs.com/profile/"
                                                    target="_blank">www.kimlabs.com</a>
                                            </li>
                                        </ul>

                                        <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit
                                            Profile</a>
                                        <br />

                                                </div>
                                                <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                                    aria-labelledby="profile-tab">
                                                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla
                                                        single-origin coffee squid. Exercitation +1 labore velit, blog
                                                        sartorial PBR leggings next level wes anderson artisan four loko
                                                        farm-to-table craft beer twee. Qui
                                                        photo booth letterpress, commodo enim craft beer mlkshk </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <script>
        document.getElementById('profilePictureInput').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function() {
                var preview = document.createElement('img');
                preview.src = reader.result;
                preview.className = 'img-thumbnail';
                document.getElementById('previewContainer').innerHTML = '';
                document.getElementById('previewContainer').appendChild(preview);
            }

            reader.readAsDataURL(input.files[0]);
        });
    </script>
    @endsection

