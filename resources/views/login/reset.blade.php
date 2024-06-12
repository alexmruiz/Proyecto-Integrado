@extends('layouts.app')

@section('title', 'EduConnect')

@section('content')
					<h1 class="mt-5 mb-4">
						Recuperar Contraseña
					</h1>
					@if (Session::has('message'))
					<div class="alert alert-success" role="alert">
						{{ Session::get('message') }}
					</div>
					@endif
				<div>
					<form action="{{ route('enviar-recuperacion') }}" method="POST">
							@csrf
						<div class="mb-4">
							<label for="email" class="form-label cursor-pointer">Email </label>
							<input type="email" class="form-control" id="email_address" name="email" required autofocus>
						</div>
						
						@if ($errors->has('email'))
						<span class="text-danger">{{ $errors->first('email') }}</span>
						@endif

						<div class="mb-4">
							<button class="btn btn-main text-white w-100" type="submit">
								Recuperar Contraseña
							</button>
						</div>
					</form>
				</div>

					<div class="mt-5">
						<a href="{{ route('log') }}" class="text-primary">
							<span>
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
								  <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
								</svg>
							</span>

							<span class="fw-bold">
								Volver a iniciar sesión
							</span>
						</a>
					</div>

				</div>
			</div>

			@endsection