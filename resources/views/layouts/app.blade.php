<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>
	
	<link rel="icon" href="{{ asset('login\assets\img\EduConnect.png') }}" sizes="400x400">
	<link rel="apple-touch-icon" href="{{ asset('login\assets\img\EduConnect.png') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('login/assets/css/main.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login/assets/library/aos/aos.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login/assets/css/style.css') }}">

</head>
<body>

	<div class="loader-wrapper">
	    <span class="loader"><span class="loader-inner"></span></span>
	</div>
	
	<div class="py-2 container">
		<div class="row my-4 mx-0 justify-content-center justify-content-lg-between overflow-hidden align-content-center" style="min-height: calc(100vh - 4rem);">
			<div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xxl-4" data-aos="zoom-in" data-aos-duration="1000">
				<div class="">
					<div>
						<a href="./index.html">
							<img src="{{ asset('EduConnect.png') }}" height="60" alt="logo">
						</a>
					</div>


                    @yield('content')




                    <div class="d-none d-lg-block col-lg-7" data-aos="fade-left" data-aos-duration="3000">
                        <div class="h-100 position-relative">
                            
                           
                            <div class="h-100 w-100 rounded bg-size-cover position-absolute z-index-n3" 
                            style="background: url('{{ asset('EduConnectIcono.jpg') }}') center top;">
                       
                           <!-- Div oscuro con opacidad reducida -->
                           <div class="h-100 w-100 rounded bg-dark position-absolute" style="opacity: 0.9;"></div>
                           
                       </div>
                       
                                <div class="row h-100 justify-content-center align-items-center">
                                    <div class="col-11 col-xl-8 text-white">
                                        <h2 class="mb-2">
                                            Conéctate, Aprende, Avanza
                                        </h2>
        
                                        <div class="text-main mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-quote" viewBox="0 0 16 16">
                                              <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                            </svg>
                                        </div>
        
                                        <div class="mb-3">
                                            En cada clase, encontrarás inspiración, motivación y el impulso necesario para alcanzar tus metas. 
                                        </div>
        
                                        <div>
                                            <img 
                                                src="{{ asset('login/assets/img/1526685517100.jpg') }}"
                                                height="40" width="40"
                                                class="img-fluid rounded-circle"
                                                alt="small team" 
                                                >
                                            <span>
                                                <span class="fw-bold ps-2">
                                                    Alejandro MR
                                                </span>
        
                                                <span class="ps-1 fw-bold text-gray">
                                                    CEO, EduConnect
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            
            <script src="{{ asset('login/assets/library/aos/aos.js') }}"></script>
            <script src="{{ asset('login/assets/js/scripts.js') }}"></script>
        
        
        </body>
        </html>