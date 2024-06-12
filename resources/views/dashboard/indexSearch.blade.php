@extends('dashboard.app')

@section('title', 'Buscar profesores')

@section('content')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Buscar nuevos profesores</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="x_panel">
                <div class="x_content">

                    <div class="clearfix"></div>
                    <div class="filter">
                        <form id="filterForm" action="{{ route('show.teacher') }}" method="GET">
                            <div class="form-group row">
                                <label for="name" class="control-label col-md-2 col-sm-3">Filtrar por nombre:</label>
                                <div class="col-md-4 col-sm-9">
                                    <select class="form-control" name="name" id="name">
                                        <option value="">Seleccione un nombre:</option>
                                        @foreach ($users as $user)
                                            @if ($user->rol === 'teacher')
                                                <option value="{{ $user->id }}" {{ request('name') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <!-- Filtro por asignatura -->
                            <div class="form-group row">
                                <label for="subject" class="control-label col-md-2 col-sm-3">Filtrar por asignatura:</label>
                                <div class="col-md-4 col-sm-9">
                                    <select class="form-control" name="subject" id="subject">
                                        <option value="">Seleccione asignatura</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->name }} {{ $subject->level }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <!-- Filtro por nivel -->
                            <div class="form-group row">
                                <label for="level" class="control-label col-md-2 col-sm-3">Filtrar por nivel:</label>
                                <div class="col-md-4 col-sm-9">
                                    <select class="form-control" name="level" id="level">
                                        <option value="">Seleccione un nivel</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level }}" {{ request('level') == $level ? 'selected' : '' }}>
                                                {{ $level }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <!-- Filtro por fecha -->
                            <div class="form-group row">
                                <label for="date" class="control-label col-md-2 col-sm-3">Filtrar por fecha:</label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="date" class="form-control" name="date" id="date" value="{{ request('date') }}">
                                </div>
                            </div>
                        
                            <!-- Filtro por hora -->
                            <div class="form-group row">
                                <label for="time" class="control-label col-md-2 col-sm-3">Filtrar por hora:</label>
                                <div class="col-md-4 col-sm-9">
                                    <input type="time" class="form-control" name="time" id="time" value="{{ request('time') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="perPage" class="control-label col-md-2 col-sm-3">Resultados por página:</label>
                                <div class="col-md-4 col-sm-9">
                                    <select class="form-control" name="perPage" id="perPage">
                                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                                        <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-2 col-sm-3">
                                    <a href="{{ route('show.teacher') }}" class="btn btn-secondary">Mostrar Todos los Profesores</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <br>
                    <br>

                    <div class="x_panel">
                        <div class="x_title">

                            @if ($teachers->count() > 0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo electrónico</th>
                                            <th>Experiencia</th>
                                            <th>Asignatura</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->about }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($teacher->subjects as $subject)
                                                            <li>{{ $subject->name }} - {{ $subject->level }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="{{ route('conversation', ['userId' => $teacher->id]) }}" class="btn btn-success btn-sm">
                                                        <i class="fa fa-user"></i> <i class="fa fa-comments-o"></i>
                                                    </a>
                                                    <a href="{{ url('/teacher/' . $teacher->id . '/calendar') }}">
                                                        <button type="button" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-calendar"></i>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div style="text-align: center;">
                                    <h5>No se han encontrado profesores</h5>
                                </div>
                            @endif
                            <div class="pagination">
                                <ul class="pagination">
                                    {{-- Enlace "Previous" --}}
                                    @if ($teachers->onFirstPage())
                                        <li class="disabled"><span>&laquo; Previous</span></li>
                                    @else
                                        <li><a href="{{ $teachers->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
                                    @endif

                                    {{-- Enlaces de páginas --}}
                                    @for ($i = 1; $i <= $teachers->lastPage(); $i++)
                                        <li class="paginate_button {{ $teachers->currentPage() == $i ? 'active' : '' }}">
                                            <a href="{{ $teachers->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    {{-- Enlace "Next" --}}
                                    @if ($teachers->hasMorePages())
                                        <li class="paginate_button next"><a href="{{ $teachers->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
                                    @else
                                        <li class="disabled"><span>Next &raquo;</span></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

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

<script>
    // Automatically submit form when a selection is made or date/time is chosen
    document.querySelectorAll('.filter select, .filter input[type="date"], .filter input[type="time"]').forEach(
        function(element) {
            element.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
</script>
@endsection
