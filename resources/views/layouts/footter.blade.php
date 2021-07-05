<!-- ========= Footer Part Start Here ========== -->
@php
	$contactmsg = App\Contactmsg::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->limit(1)->get();
@endphp	   

<footer id="footer">
	   	<div class="container">
	   		<div class="row">
	   			<div class="col-lg-5 col-md-12 col-sm-12">
                       <a href="{{route('index')}}"><img src="{{asset('frontend/images/logo.png')}}" alt="Wecoder-ITLogo"  class="footerlogo"></a>
	   				 @foreach ($contactmsg as $item)
						<div class="text">
								{{strip_tags($item->detalis) }}
						</div>
					@endforeach
	   			</div>
	   			<div class="col-lg-2 col-md-4 col-sm-6 col-6">
	   				<div class="help">
	   					<h5>Helpful Links</h5>
		   				<ul class="footer-nav">
							<li><a href="{{route('home.about')}}"><i class="fa fa-angle-right"></i><span>About Us</span></a></li>
							<li><a href="{{route('home.facilites')}}"><i class="fa fa-angle-right"></i><span>Features</span></a></li>
							<li><a href="{{route('home.faq')}}"><i class="fa fa-angle-right"></i><span>FAQ’s</span></a></li>
							<li><a href="{{route('home.facilites')}}"><i class="fa fa-angle-right"></i><span>Blog</span></a></li>
						</ul>
	   				</div>
	   			</div>
	   			<div class="col-lg-2 col-md-4 col-sm-6 col-6">
					<div class="support">
						<h5>Support</h5>
					<ul class="footer-nav">
						<li><a href="{{route('home.support')}}"><i class="fa fa-angle-right"></i><span>Privacy Policy</span></a></li>
						<li><a href="{{route('home.support')}}"><i class="fa fa-angle-right"></i><span>Terms of Use</span></a></li>
						<li><a href="{{route('home.support')}}"><i class="fa fa-angle-right"></i><span>Support Center</span></a></li>
						<li><a href="{{route('home.support')}}"><i class="fa fa-angle-right"></i><span>Contact</span></a></li>
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
	   		<div class="row">
				<div class="col-lg-12">
					<p class="copyright">© 2021 Turing. All Rights Reserved.</p>
				</div>
			</div>
	   	</div>
	   </footer>