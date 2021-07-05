@php
	$banner =   App\Banner::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->get();
       
    
	$achive =   App\Achive::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->limit(4)->get();
       
    

	$facilites =    App\Facilite::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->get();
       
    

	$leaders =   App\Leader::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->limit(1)->get();
   

    $post = App\Post::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->get();


  

   

@endphp

@extends('layouts.app')
@section('title', 'Wecoder-It')

@section('content')

	<!-- Start Banner Nav -->
	

	<section id="banner">
		<div class="row  mx-0">
			
			<div class="col-lg-12 px-0">
				<div class="banner-item">
					<div id="carouselExampleFade" class="carousel slide   carousel-fade" data-ride="carousel" data-interval="1000">
						<div class="carousel-inner">
							@foreach ($banner as $item)
							  <div class="carousel-item {{ $loop->first ? 'active ' : '' }}">
								<img loading="lazy" src="{{asset('/Image/Banner/'.$item->imagename)}}" alt="" class="img-fluid w-100" alt="Responsive image">
							  </div>
							  @endforeach	
						</div>
						
						
					</div>
				</div>
			</div>

			
			
		</div>
	</section>
	<!-- End Banner Nav -->

	  <!-- ========= Achievement Part Start Here ========== -->
	  <section id="achivement">
	  	<div class="container">
	  		<div class="row">

				@foreach ($achive as $item)
					<div class="col-lg-3 col-sm-6 col-md-6 ">
						<a href="#">
						<div class="achive-item text-center">
							<div class="icon">
								<i class="fa fa-cloud"></i>
							</div>
								<h5 class="achive-title" class="features-title">{{$item->name}}</h5>
							<p class="achive-para">{{$item->shottitle}}</p>
						</div>
						</a>
					</div>
				@endforeach
	  			
                  
	  			
	  		</div>
	  	</div>
	  </section>
	  <!-- ========= Achievement Part End Here ========== -->
	  <!-- ========= Course Part Start Here ========== -->
	{{-- <section id="course" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common-head text-center">
                        <h2>Our Courses</h2>
                        <p>Explore the weapons of Latest Information Technology!</p>
                    </div>
                </div>
            </div>
            <div class="row tabs">
                <div class="col-lg-4 col-sm-12 col-md-8 m-md-auto ">
                    <ul class="nav flex-column nav-pills ">
                        @foreach ($category as $item)
                        <li class="{{ $item->id == 1 ? 'active ' : '' }}">
                            <a href="#tab_{{$item->id}}" data-toggle="tab" class="{{ $item->id == 1 ? 'active ' : '' }}">
                                <i class="fa fa-angle-right"></i>
								<span>{{$item->name}}</span>
                            </a>
                        </li>
                        @endforeach
                       
                        
                    </ul>
                </div>
                <div class="col-lg-8 col-sm-12 col-md-12  ">
                    <div class="tab-content">

                        @foreach ($category as $item)
                        <div class="tab-pane {{ $item->id == 1 ? 'active ' : '' }}" id="tab_{{$item->id}}">
                            <div class="row">

                             @foreach ($item->post as $element)
                            	<div class="col-lg-5 col-sm-5">
                                    <div class="gd-right">
                                        <img loading="lazy"  src="{{asset('/Image/Post/'.$element->imagename2)}}" alt="gd1" class="img-fluid w-100">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-7 pr-0">
                                    <div class="gd-left">
                                        <h3>{{$element->name}}</h3>
                                        {{ Strip_tags($element->shottitle) }}
                                        <a href="{{url('courseDetalis/' . $element->slug)}}" class="read_mores"><span class="highlight-icon">&#187; </span>Read More</a>
                                    </div>
                                     <div class="seat">
                                        	<p><a href="{{route('Adform.all')}}">Admission Going On</a></p>
                                     </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="course-button text-center">
                        <a href="course.html">Other courses</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


	<section id="course" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common-head text-center">
                        <h2>Our Courses</h2>
                        <p>Explore the weapons of Latest Information Technology!</p>
                    </div>
                </div>
            </div>
            <div class="row tabs justify-content-center">
                <div class="col-lg-8 col-sm-12 col-md-12  ">
                    <div class="tab-contents">
						@foreach ($post as $element)
						<div class="tab-pane active" id="tab_1">
                            <div class="row">
                            	<div class="col-lg-5 col-sm-5">
                                    <div class="gd-right">
                                        <img loading="lazy"  src="{{asset('/Image/Post/'.$element->imagename2)}}" alt="gd1" class="img-fluid w-100">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-sm-7 pr-0">
                                    <div class="gd-left">
                                        <h3>{{$element->name}}</h3>
                                        {{ Strip_tags($element->shottitle) }}
                                        <a href="{{url('courseDetalis/' . $element->slug)}}" class="read_mores"><span class="highlight-icon">&#187; </span>Read More</a>
                                    </div>
                                     <div class="seat">
                                        	<a href="{{route('Adform.all')}}">Admission Going On</a>
                                     </div>
                                </div>
                                
                            </div>
                        </div>
						@endforeach
                       
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="course-button text-center">
                        <a href="{{route('home.allcourse')}}">Other courses</a>
                    </div>
                </div>
            </div>
        </div>
    </section>




<!-- ========= Course Part End Here ========== -->

    <!-- ========= Counselling Part Mobile Start Here ========== -->
		<section id="counseling">
			<div class="container">
				<div class="row justify-content-center">
                	 <div class="col-lg-8 col-sm-12">
                    <div class="counseling-form" >
                        <h3>Career Counselling</h3>
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

                            <form action="{{route('counsell.allstore')}}" method="post">
								@csrf
								<small class="text-danger">{{ $errors->first('name') }}</small>
                               <input type="text" placeholder="Your Name" name="name" value="" class="form-control  ">
							   <small class="text-danger">{{ $errors->first('email') }}</small>
							   <input type="email" placeholder="Email Address" name="email" value="" class="form-control  ">
							   <small class="text-danger">{{ $errors->first('Phone Number') }}</small>
                               <input type="number" placeholder="Phone Number" name="phone" value="" class="form-control  ">
                               <button type="submit" name="submit" class="btn form-control ">submit</button>
                        	</form>
                    </div>
                </div>
				</div>
			</div>
		</section>

    
   

			<section id="faciltes">
				<div class="container">
				  <div class="row justify-content-center">
		               <div class="col-lg-8 ">
		                    <div class="common-head text-center" >
		                        <h2>Our Facilities</h2>
		            			<p>Explore the weapons of Latest Information Technology!</p>
		            		</div>
		            	</div>
		         </div>

		         <div class="row">
					 @foreach ($facilites as $item)
					 <div class="col-lg-4 col-sm-6 ">
						<div class="facilities-item">
							<div class="icon">
								<img src="{{asset('/Image/Facilities/'.$item->imagename)}}" alt="" width="80;" height="80">
							</div>
						   <h3>{{$item->name}}</h3>
						   <p>
							{{$item->detalis}}
						   </p>
					   </div>
					</div>
					 @endforeach
		         	
		         </div>
			</section>

	  <!-- ========= Facilities Part End Here ========== -->
	   <!-- ========= Leader Part Start Here ========== -->
	  <section id="leaders">
	  	<div class="container">
	  		<div class="row justify-content-center">
	  			<div class="col-lg-8 ">
                    <div class="common-head text-center" >
                        <h2>Creating Future Leader</h2>
            			<p>We are the makers of Future Leaders!</p>
            		</div>
		        </div>
	  		</div>
	  		<div class="row  justify-content-center ">
	  			<div class="">
	  				<div class="col-lg-9 col-sm-12 m-auto">
						<div class="">
							@foreach ($leaders as $item)
							<div class="lerader ">
								<div class="row justify-content-center ">
								<div class="col-lg-8 col-md-7 col-sm-12">
									<div class="leader-speach">
										<h4>{{$item->name}}</h4>
										<h6>{{$item->title}}</h6>
										<p>{{$item->detalis}}</p>
									</div>
								</div>
								<div class="col-lg-4 col-md-5 col-sm-6 m-sm-auto">
									<div class="leader-img">
										<img  src="{{asset('/Image/Leaders/'.$item->imagename)}}" alt="" class="img-fluid w-100">
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
						
	  				
	  			</div>
	  			</div>
	  		</div>
	  		
	  	</div>
	  </section>
	   <!-- ========= Leader Part End Here ========== -->

	  
	
	   <!-- ========= Footer Part End Here ========== -->
@endsection
