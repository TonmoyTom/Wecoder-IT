@extends('layouts.app')
@section('title', 'Wecoder-It')

@section('content')

	<!-- Start Banner Nav -->
		<!-- Start Back top   -->
				<a href="#" class="back2 arrow" style= "display: block;">
				 <i class="fas fa-angle-double-up"></i>
				</a>
	    <!-- Start Back top   -->

         <!-- ========= breadcrumb Part End Here ========== -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1> Contact</h1>
                    <p>
                        <a href="">Home</a>
                       <i class="fas fa-angle-double-right"></i>
                        <a href="#"><span>Contact Form</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->

@php
    $contants =  App\Contactmsg::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->first();
   
@endphp


<section class="page">
    <!-- ***** Page Top Start ***** -->
    <!-- ***** Page Content Start ***** -->
    <div class="page-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact">
                        <div class="map-wrapper">
                            <!-- ***** Google Maps Start ***** -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59057.749745924564!2d91.74813439777496!3d22.31170349118043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acdec55dd23931%3A0xb4f7439c6623a22e!2sHalishahar%2C%20Chattogram!5e0!3m2!1sen!2sbd!4v1617812460696!5m2!1sen!2sbd" height="500" width="100%" allowfullscreen="" loading="lazy"></iframe>
                            <!-- ***** Google Maps End ***** -->
                        </div>
                        <div class="contact-info">
                            <div class="row">
                            
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="item">
                                        <i class="fa fa-location-arrow"></i>
                                        <div class="txt">
                                            <span>{!! $contants->address !!}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="item">
                                        <i class="fa fa-phone"></i>
                                        <div class="txt">
                                            <span>{{$contants->phone1}} <br> {{$contants->phone2}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="item">
                                        <i class="fa fa-envelope"></i>
                                        <div class="txt">
                                            <span><a href="{{$contants->email}}">{{$contants->email}}</a></span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <i class="fa fa-envelope"></i>
                                        <div class="txt">
                                            <span><a href="{{$contants->email2}}">{{$contants->email2}}</a></span>
                                        </div>
                                    </div>
                                </div>
                         

                               
                            </div>
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-github-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="contact-bottom">
                        <div class="row">
                            <!-- ***** Contact Text Start ***** -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <h5 class="margin-bottom-30">Get in touch</h5>
                                <div class="contact-text">
                                   {!! $contants->detalis !!}
                                </div>
                            </div>
                            <!-- ***** Contact Text End ***** -->

                            <!-- ***** Contact Form Start ***** -->

                            
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <div class="contact-form">
                                    <form method="POST" action="{{route('contact.allstore')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                                <input type="text" placeholder="Name, surname" name="name">
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                                <input type="email" placeholder="E-Mail" name="email">
                                            </div>
                                            <div class="col-lg-12">
                                                <small class="text-danger">{{ $errors->first('message') }}</small>
                                                <textarea placeholder="Your message" name="message"></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" class="btn-primary-line" name="submit">SEND</button>
                                            </div>
                                        </div>
                                    <form>
                                </div>
                            </div>
                            <!-- ***** Contact Form End ***** -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Page Content End ***** -->

</section>
    


	   <!-- ========= Footer Part Start Here ========== -->
	   <footer id="footer">
	   	<div class="container">
	   		<div class="row">
	   			<div class="col-lg-5 col-md-12 col-sm-12">
	   				<div class="fotterlogos">
	   					<img src="{{asset('frontend/images/logo.png')}}" alt="" class="footerlogo">
	   				</div>
	   				<div class="text">
	   					Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.
	   				</div>
	   			</div>
	   			<div class="col-lg-2 col-md-4 col-sm-6 col-6">
	   				<div class="help">
	   					<h5>Helpful Links</h5>
		   				<ul class="footer-nav">
							<li><a href="#"><i class="fa fa-angle-right"></i><span>About Us</span></a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i><span>Features</span></a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i><span>FAQ’s</span></a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i><span>Blog</span></a></li>
						</ul>
	   				</div>
	   			</div>
	   			<div class="col-lg-2 col-md-4 col-sm-6 col-6">
					<div class="support">
						<h5>Support</h5>
					<ul class="footer-nav">
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Privacy Policy</span></a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Terms of Use</span></a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Support Center</span></a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Contact</span></a></li>
					</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-12">
					<div class="contact">
						<h5>Contact Us</h5>
					<div class="address">
						<p>AC Mosque in front G-block,PC<br>Road,Halishahar H/E,Chittagong</p>
						<p>Phone: +0881610989228</p>
						<p><span>E-Mail:</span><a href="#">wecoderit@gmail.com</a></p>
						<div class="center">
							<ul class="social">
							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
							<li><a href="#"><i class="fa fa-github-square"></i></a></li>
						</ul>
						</div>
					</div>
					</div>
				</div>
	   		</div>
	   		<div class="row">
				<div class="col-lg-12">
					<p class="copyright">© 2021 Turing. All Rights Reserved.</p>
				</div>
			</div>
	   	</div>
	   </footer>
	   <!-- ========= Footer Part End Here ========== -->
@endsection
