@extends('layouts.app')

@section('title', 'EduConnect')

@section('content')
					<h1 class="mt-5 mb-4">
											
					</h1>


					<div>
						<button class="btn btn-danger text-white w-100 d-flex">
							<span class="me-auto">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
								  <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
								</svg>
							</span>
							<span class="me-auto">
								Inicia sesión con Google
							</span>
						</button>
					</div>

					<div class="mt-2">
						<button class="btn btn-primary text-white w-100 d-flex">
							<span class="me-auto">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 320 512">
								<path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
							</span>
							<span class="me-auto">
								Iniciar sesión usando Facebook
							</span>
						</button>
					</div>

					<div class="d-flex align-items-center my-4">
						<span class="d-inline-block w-45 border-top me-auto mt-2"></span>
						<span class="">o</span>
						<span class="d-inline-block w-45 border-top ms-auto mt-2"></span>
					</div>

					<div>
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="col">
								<label for="rol">Rol</label>
								<select id="rol" name="rol">
									<option value="student">Estudiante</option>
									<option value="teacher">Profesor</option>
								</select>
							</div>
							<!-- Mostrar asignaturas solo si el rol es profesor -->
							<div id="asignaturas_container" style="display: none;">
								<label for="asignaturas">Asignaturas que imparte</label>
								
								<select id="asignaturas" name="asignaturas[]" multiple>
									<!-- Aquí se cargarán las opciones de asignaturas -->
									@foreach($subjects as $subject)
									<option value="{{ $subject->id }}">{{ $subject->name }}-{{ $subject->level }}</option>
								@endforeach
								</select>
							</div>
							<br>
							<div class="row mb-3">
								<div class="col">
									<label for="name" class="form-label cursor-pointer">Nombre</label>
									<input type="text" class="form-control" id="firstName" name="name" required>
									{{-- Si hay un error tendremos el mensaje --}}
									@if ($errors->has('name'))
										{{ $errors->first('name') }}
									@endif
								</div>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label cursor-pointer">Email</label>
								<input type="email" class="form-control" id="email" name="email" required>
								{{-- Si hay un error tendremos el mensaje --}}
								@if ($errors->has('email'))
									{{ $errors->first('email') }}
								@endif
							</div>
							<div class="mb-3">
								<label for="password" class="form-label cursor-pointer">Contraseña</label>
								<input type="password" class="form-control" id="password" name="password" required>
								{{-- Si hay un error tendremos el mensaje --}}
								@if ($errors->has('password'))
									{{ $errors->first('password') }}
								@endif
							</div>
							<div class="mb-3">
								<label for="password_confirmation" class="form-label cursor-pointer">Confirmar contraseña</label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
								{{-- Si hay un error tendremos el mensaje --}}
								@if ($errors->has('password_confirmation'))
									{{ $errors->first('password_confirmation') }}
								@endif
							</div>
						
						
						<div class="mb-3">
							<button class ="btn btn-primary text-white w-100 d-flex" type="submit">
								Registrarse
							</button>
						</div>

					</form>

						<div class="text-center">
							<span class="pe-2">
								¿Ya tiene una cuenta?
							</span>
							<a href="{{ route('log') }}">
								Entrar
							</a>
						</div>
					</div>

				</div>
			</div>

			<script>
				document.getElementById('rol').addEventListener('change', function() {
					var rol = this.value;
					var asignaturasContainer = document.getElementById('asignaturas_container');
					if (rol === 'teacher') {
						asignaturasContainer.style.display = 'block';
					} else {
						asignaturasContainer.style.display = 'none';
					}
				});
			</script>

			@endsection