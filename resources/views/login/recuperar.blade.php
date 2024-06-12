@extends('layouts.app')

@section('title', 'EduConnect')

@section('content')
					<h1 class="mt-5 mb-4">
						Recuperar contraseña					
					</h1>
					
					<div>
						<form action="{{ route('actualizar-contrasenia') }}" method="POST">
							@csrf
							<input type="hidden" name="token" value="{{ $token }}">
							
							<div class="mb-3">
								<label for="email" class="form-label cursor-pointer">Email</label>
								<input type="email" class="form-control" id="email" name="email" required>
								{{-- Si hay un error tendremos el mensaje --}}
								@if ($errors->has('email'))
								<span class="text-danger">{{ $errors->first('email') }}</span>
							@endif
							</div>

							@if ($errors->any())
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							<div class="mb-3">
								<label for="password" class="form-label cursor-pointer">Contraseña</label>
								<input type="password" class="form-control" id="password" name="password" required>
								{{-- Si hay un error tendremos el mensaje --}}
								@if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
							</div>
							<div class="mb-3">
								<label for="password_confirmation" class="form-label cursor-pointer">Confirmar contraseña</label>
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
								{{-- Si hay un error tendremos el mensaje --}}
								@if ($errors->has('password_confirmation'))
								<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
							@endif
							</div>
						
						
						<div class="mb-3">
							<button class ="btn btn-primary text-white w-100 d-flex" type="submit">
								Cambiar contraseña
							</button>
						</div>

						

						<div class="text-center">
							<span class="pe-2">
								¿Ya tiene una cuenta?
							</span>
							<a href="{{ route('log') }}">
								Entrar
							</a>
						</div>

					</form>
					</div>

				</div>
			</div>
			@endsection	

			