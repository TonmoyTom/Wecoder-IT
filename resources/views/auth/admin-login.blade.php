<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="{{asset('frontend/css/fontawesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/dropify.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/responsive.css')}}">

    <title>Admin Login</title>


  </head>
  <body>

<!-- ========= Login Part Start Here ========== -->

	<section id="login">
		<div class="container">
		<div class="row main-content  justify-content-center">
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
					<div class="login_logo text-center">
						<a href="{{route('index')}}""><img src="{{asset('frontend/images/logo.png')}}" alt="Wecoder-ITLogo"  class="img-fluid"></a>
					</div>
					<div class="form_detalis ">
                      
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf
							<div class="row">
								<input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
                                <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							
							<div class="form_btn text-center">
                                <button type="submit" class="btn y">
                                    {{ __('Login') }}
                                </button>
							</div>
						</form>
					</div>
					
				</div>
		</div>
	</div>
	<!-- Footer -->
	</section>

<!-- ========= Login Part Start Here ========== -->

    <script type="text/javascript"  src="{{asset('frontend/js/jquery.min.js')}}" ></script>
	<script type="text/javascript" src="{{asset('frontend/js/popper.min.js')}}" ></script>
	<script type="text/javascript" src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" type="text/javascript" src="{{asset('frontend/js/slick.min.js')}}"></script>
	
	<script type="text/javascript" type="text/javascript" src="{{asset('frontend/js/script.js')}}"></script>

    <script src="https://kit.fontawesome.com/417824116f.js"></script>

