
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

					@if (session('message'))
						<div class="alert alert-success">
							{{ session('message') }}
						</div>
					@endif

					<div class="d-flex align-items-center my-4">
						<span class="d-inline-block w-45 border-top me-auto mt-2"></span>
						<span class="">o</span>
						<span class="d-inline-block w-45 border-top ms-auto mt-2"></span>
					</div>
					@if(session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
					@endif
					<div>
						<form method="POST" action="{{ route('custom-login') }}">
							@csrf	
							<div class="mb-3">
								
								<label for="email" class="form-label cursor-pointer">Email </label>
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label cursor-pointer">Contraseña</label>
								<input id="password" class="form-control" type="password" name="password" required>
							</div>

							<div class="mb-3 text-center">
								<button class="btn btn-primary text-white w-100 d-flex mx-auto" type="submit">
									Iniciar sesión
								</button>
							</div>

							<div class="d-flex justify-content-between flex-wrap">
								<span class="mt-2">
									<span class="pe-2">
										¿No tiene cuenta?
									</span>
									<a href="{{ route('registro') }}" class="pe-2">
										Regístrese      
									</a>
									<br>
									<a href="{{ route('reset') }}" class="mt-2">
										¿Olvidó su contraseña?
									</a>
								</span>
							
							</div>
							@if ($errors->any())
							<div>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
						</form>
					</div>

				</div>
			</div>
			@endsection
			