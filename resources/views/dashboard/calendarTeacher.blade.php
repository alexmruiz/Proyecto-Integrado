<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EduConnect </title>


    <!-- Bootstrap -->
    <link href="{{ asset('dashboard/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('dashboard/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('dashboard/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="{{ asset('dashboard/vendors/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('dashboard/build/css/custom.min.css') }}" rel="stylesheet">


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
                                    <img src="{{ asset('uploads/avatar.png') }}" alt="Avatar" class="img-circle profile_img">
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
                            <li><a href="{{ route ('home') }}"><i class="fa fa-home"></i> Mis cursos <span
                                        class="label label-success pull-right"></span></a>

                            <li><a href="{{ route ('calendar') }}"><i class="fa fa-calendar"></i> Calendario <span
                                        class="label label-success pull-right"></span></a></li>

                            <li><a><i class="fa fa-mortar-board"></i> Calificaciones <span
                                        class="label label-success pull-right"></span></a></li>


                            <li><a><i class="fa fa-comment-o"></i> Chat<span
                                        class="label label-success pull-right"></span></a></li>


                            <li><a><i class="fa fa-tasks"></i>Tareas <span
                                        class="label label-success pull-right"></span></a></li>

                            <li><a><i class="fa fa-search"></i>Nuevos profesores <span
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
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                
                                        

                                        {{ Auth::user()->name }}
                                 
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:;"> Perfil</a>
                                
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

        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Calendario de {{ $teacher->name }}</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-8 col-sm-8   form-group pull-right top_search">
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
                    <div class="col-md-12 col-sm-12">
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
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAddEvent" tabindex="-1" aria-labelledby="modalAddEventLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddEventLabel">Agregar Nuevo Evento</h5>
                        <button type="button" class="btn-close modal-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formAddEvent">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Fecha de Inicio</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Fecha de Fin</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                    required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="cancelEventBtn"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-primary" id="saveEventBtn">Guardar
                                    Evento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="calendar"></div>


        {{-- FORMULARIO PARA EDITAR --}}
        <div class="modal fade" id="modalEditEvent" tabindex="-1" aria-labelledby="editEventModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editEventModalLabel">Editar Evento</h5>
                        <button type="button" class="btn-close" id="closeModalBtn" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editEventForm">
                            <input type="hidden" id="eventId" name="eventId">
                            <div class="mb-3">
                                <label for="editTitle" class="form-label">Título</label>
                                <input type="text" class="form-control" id="editTitle" name="editTitle">
                            </div>
                            <div class="mb-3">
                                <label for="editDescription" class="form-label">Descripción</label>
                                <textarea class="form-control" id="editDescription" name="editDescription"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="editStart" class="form-label">Fecha de Inicio</label>
                                <input type="datetime-local" class="form-control" id="editStart" name="editStart">
                            </div>
                            <div class="mb-3">
                                <label for="editEnd" class="form-label">Fecha de Fin</label>
                                <input type="datetime-local" class="form-control" id="editEnd" name="editEnd">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="deleteEventBtn">Eliminar</button>
                        <button type="button" class="btn btn-secondary" id="cancelEventBtn"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="updateEventBtn">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- /page content -->


        <!-- footer content -->

        <!-- /footer content -->
    </div>
    </div>






    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('dashboard/vendors/jquery/dist/jquery.min.js') }}"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="{{ asset('dashboard/fullcalendar/fullcalendar-6.1.11/dist/index.global.js') }}"></script>
    <script src="{{ asset('dashboard/fullcalendar/fullcalendar-6.1.11/packages/core/locales/es.global.js') }}"></script>
    {{-- <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'> --}}
    {{-- <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'> --}}
    {{-- <script src="{{ asset('dashboard/fullcalendar/fullcalendar-6.1.11/bootstrap.min.js') }}"></script> --}}
    <!-- Bootstrap Styles -->
   {{--  <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css'
        rel='stylesheet' />--}}





    <!-- Bootstrap -->
    <script src="{{ asset('dashboard/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('dashboard/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('dashboard/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Dropzone.js -->
    <script src="{{ asset('dashboard/vendors/dropzone/dist/min/dropzone.min.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('dashboard/build/js/custom.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($formattedEvents),
                locale: 'es',
                firstDay: 1, // Establecer el primer día de la semana en lunes
                slotMinTime: '07:00',
                themeSystem: 'standard',
                //editable: true,
                timeZone: 'local',
                //selectable: true,
                headerToolbar: {
                    start: 'prevYear,prev,today,next,nextYear', // Botones para cambiar al año anterior, mes anterior, hoy, mes siguiente y año siguiente
                    center: 'title', // Título del calendario
                    end: 'dayGridMonth,timeGridWeek,timeGridDay', // Botones para cambiar a la vista de mes, semana y día
                },
                
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día',
                    list: 'Lista'
                },
                
                dateClick: function(info) {
                    clickedDate = info.date; // Almacena la fecha clickeada
                    console.log('Fecha clickeada:',
                        clickedDate); // Verifica la fecha clickeada en la consola

                    // Establece la fecha de inicio y fin en los campos de fecha del modal
                    $('#start_date').val(info.dateStr + 'T00:00');
                    $('#end_date').val(info.dateStr + 'T23:59');

                    // Abre el modal
                    //$('#modalAddEvent').modal('show');
                },
                eventTimeFormat: {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                },
                /*eventClick: function(info) {
                    var eventId = info.event.id;
                    var event = calendar.getEventById(eventId);
                    $('#eventId').val(event.id);
                    $('#editTitle').val(event.title);
                    $('#editDescription').val(event.extendedProps.description);
                    $('#editStart').val(event.startStr);
                    $('#editEnd').val(event.endStr);
                    $('#modalEditEvent').modal('show');
                },*/



            });


            calendar.render();



            // Manejador para el botón "Guardar" en el formulario de creación de eventos
            $('#saveEventBtn').on('click', function() {
                // Obtener los datos del formulario
                var eventData = {
                    title: $('#title').val(),
                    description: $('#description').val(),
                    start_date: $('#start_date').val(),
                    end_date: $('#end_date').val()
                    // Otros campos del evento si es necesario
                };

                $.ajax({
                    url: '/events', // Ruta del controlador para almacenar el evento
                    type: 'POST', // Método de la solicitud
                    data: Object.assign({
                        _token: '{{ csrf_token() }}'
                    }, eventData), // Incluir el token CSRF y los datos del evento
                    success: function(response) {
                        console.log(response
                            .message); // Mostrar mensaje de confirmación
                        console.log(response.event);
                        // Verificar si la respuesta contiene los datos del evento
                        if (response.event) {
                            // Agregar el evento al calendario
                            calendar.addEvent(response.event);
                        } else {
                            console.error(
                                'La respuesta del servidor no contiene datos de evento'
                            );
                        }

                        // Cerrar ventana modal
                        $('#modalAddEvent').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
            //MANEJADORES 

            // Manejador para el botón "Cancelar"
            $('#cancelEventBtn').on('click', function() {
                // Realizar acciones adicionales si es necesario
                console.log("Se ha cancelado la operación.");

                // Cerrar la ventana modal después de realizar las acciones adicionales
                $('#modalAddEvent').modal('hide');
            });

            // Manejador para cerrar la ventana modal al hacer clic en la "X"
            $('.modal-close').on('click', function() {
                $('#formAddEvent').trigger('reset');
                $('#modalAddEvent').modal('hide');
            });






            // Manejador para el botón "Actualizar Evento"

            $('#updateEventBtn').on('click', function() {
                var eventId = $('#eventId').val();
                var data = {
                    title: $('#editTitle').val(),
                    description: $('#editDescription').val(),
                    start_date: $('#editStart').val(),
                    end_date: $('#editEnd').val(),
                };
                // Cerrar el modal de edición
                $('#modalEditEvent').modal('hide');

                console.log("Enviando datos actualizados:",
                    data); // Log de updatedData antes del AJAX
                $.ajax({
                    url: '/events/' + eventId,
                    type: 'PUT',
                    data: {
                        _token: '{{ csrf_token() }}', // Incluye el token CSRF
                        // Aquí deberías incluir los demás datos que quieres enviar
                        // Ejemplo:
                        title: $('#editTitle').val(),
                        description: $('#editDescription').val(),
                        start_date: $('#editStart').val(),
                        end_date: $('#editEnd').val()
                    },
                    success: function(response) {
                        console.log("Datos recibidos", response);

                        // Actualiza el evento en el calendario con los datos recibidos del controlador
                        var updatedEvent = response.event;
                        var calendarEvent = calendar.getEventById(eventId);
                        calendarEvent.setProp('title', updatedEvent.title);
                        calendarEvent.setStart(updatedEvent.start);
                        calendarEvent.setEnd(updatedEvent.end);
                        calendarEvent.setExtendedProp('description', updatedEvent.description);

                        // Cierra el modal después de actualizar
                        $('#modalEditEvent').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });




            // Manejador para el botón "Eliminar Evento"
            $('#deleteEventBtn').on('click', function() {
                var eventId = $('#eventId').val();

                // Confirmar con el usuario antes de eliminar el evento
                if (confirm("¿Estás seguro de que quieres eliminar este evento?")) {
                    $.ajax({
                        url: '/events/' + eventId,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}', // Incluye el token CSRF
                        },
                        success: function(response) {
                            console.log(response);
                            // Elimina el evento del calendario
                            var deletedEvent = calendar.getEventById(
                                eventId);
                            deletedEvent.remove();
                            // Cierra el modal después de eliminar el evento
                            $('#modalEditEvent').modal('hide');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });

            $(document).ready(function() {
                // Tu código JavaScript aquí
                $('#cancelEditEventBtn').on('click', function() {
                    // Cerrar la ventana modal
                    $('#modalEditEvent').modal('hide');
                });

                $('#closeEditModalBtn').on('click', function() {
                    $('#modalEditEvent').modal('hide');
                });
            });




        });
    </script>

</body>

</html>
