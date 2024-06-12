@extends('dashboard.app')

@section('title', 'Lista chat')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Sala de chat</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <!-- Filter and Search -->
                                    <div class="mb-3">
                                        <form id="filterForm" action="{{ route('show.chat') }}" method="GET">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="role_filter">Filtrar por rol:</label>
                                                    <select class="form-control filter-form-control" id="role_filter" name="role_filter">
                                                        <option value="">Todos</option>
                                                        <option value="student" {{ request('role_filter') == 'student' ? 'selected' : '' }}>Alumnos</option>
                                                        <option value="teacher" {{ request('role_filter') == 'teacher' ? 'selected' : '' }}>Profesores</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="perPage">Mostrar por página:</label>
                                                    <select class="form-control filter-form-control" id="perPage" name="perPage">
                                                        <option value="10" {{ request('perPage') == '10' ? 'selected' : '' }}>10</option>
                                                        <option value="20" {{ request('perPage') == '20' ? 'selected' : '' }}>20</option>
                                                        <option value="50" {{ request('perPage') == '50' ? 'selected' : '' }}>50</option>
                                                        <option value="100" {{ request('perPage') == '100' ? 'selected' : '' }}>100</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="name_search">Buscar por nombre:</label>
                                                    <input type="text" class="form-control filter-form-control" id="name_search"
                                                        name="name_search" placeholder="Introduzca un nombre"
                                                        value="{{ request('name_search') }}">
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="{{ route('show.chat') }}"
                                                        class="btn btn-secondary mt-4">Limpiar filtros</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Filter and Search End -->
                                    <table id="datatable-checkbox"
                                        class="table table-striped table-bordered bulk_action dataTable no-footer"
                                        style="width: 100%;" role="grid" aria-describedby="datatable-checkbox_info">
                                        <!-- Table Header -->
                                        <thead>
                                            <tr role="row">
                                                <th>Nombre</th>
                                                <th>Rol</th>
                                                <th>Asignatura</th>
                                            </tr>
                                        </thead>
                                        <!-- Table Body -->
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr role="row">
                                                    <td><a
                                                            href="{{ route('conversation', ['userId' => $user->id]) }}">{{ $user->name }}</a>
                                                    </td>
                                                    <td>{{ $user->rol }}</td>
                                                    @if ($user->rol == 'teacher')
                                                        <td>
                                                            @foreach ($user->subjects as $subject)
                                                                {{ $subject->name }}
                                                                ({{ $subject->level }})
                                                            @endforeach
                                                        </td>
                                                    @else
                                                        <td>-</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                    <div class="pagination">
                                        <ul class="pagination">
                                            {{-- Enlace "Previous" --}}
                                            @if ($users->onFirstPage())
                                                <li class="disabled"><span>&laquo; Previous</span></li>
                                            @else
                                                <li><a href="{{ $users->previousPageUrl() }}" rel="prev">&laquo; Previous</a></li>
                                            @endif
                                    
                                            {{-- Enlaces de páginas --}}
                                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                                <li class="paginate_button {{ $users->currentPage() == $i ? 'active' : '' }}">
                                                    <a href="{{ $users->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor
                                    
                                            {{-- Enlace "Next" --}}
                                            @if ($users->hasMorePages())
                                            <li class="paginate_button next"><a href="{{ $users->nextPageUrl() }}" rel="next">Next &raquo;</a></li>
                                            @else
                                                <li class="disabled"><span>Next &raquo;</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <!-- Pagination End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

    <script>
        // Escucha los cambios en los elementos de filtro y envía el formulario automáticamente
        document.querySelectorAll('.filter-form-control').forEach(function(element) {
            element.addEventListener('change', function() {
                document.getElementById('filterForm').submit();
            });
        });
    </script>
@endsection
