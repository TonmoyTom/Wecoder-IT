@extends('layouts.app')
@section('title', 'Wecoder-it| Course Detalis')

@section('content')
     <!-- ========= breadcrumb Part End Here ========== -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1>Our About</h1>
                    <p>
                        <a href="{{route('home')}}">Home</a>
                       <i class="fas fa-angle-double-right"></i>
                        <a href=""><span> CourseDetalis</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->
        
<!-- ========= Single course  Part Start Here ========== -->



<section id="all-course">
        <div class="container">
            <div class="row tabs">
                <div class="col-lg-4 col-sm-12 col-md-5">
                    <div class="related-course d-none d-lg-block d-md-block">
                        <div class="course-info">
                            <h3>Related Courses</h3>
                        </div>
                    <ul class=" ">
                        @foreach ($subCategory as $item)
                            @foreach ($item->post as $element)
                            <li class="">
                               
                                <a href="{{url('courseDetalis/' . $element->slug)}}" >
                                    <i class="fa fa-angle-right"></i>
                                    <span>{{$item->name}}</span>
                                </a>
                              
                            </li>
                            @endforeach
                        @endforeach
                    </ul>
                    </div>

                    <div class="counseling-form d-none d-lg-block d-md-block">
                        <div class="course-info">
                        <h3>Career Counselling</h3>
                    	</div>
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
                               <input type="text" placeholder="Your Name" name="name" value="" class="form-control  ">
							   <input type="email" placeholder="Email Address" name="email" value="" class="form-control  ">
                               <input type="number" placeholder="Phone Number" name="phone" value="" class="form-control  ">
                               <button type="submit" name="submit" class="btn form-control ">submit</button>
                        	</form>
            		</div>

            
                </div>
                <div class="col-lg-8 col-sm-12 col-md-7 px-sm-0 px-lg-3 xtra11">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                         
                            <div class="xtra12">
                                <div class="course-head">
                                    <h1>{{$courseDetalis->name}}</h1>
                                </div>
                                <div class="course-img">
                                    <img src="{{asset('/Image/Post/'.$courseDetalis->imagename)}}" class="img-fluid w-100">
                                </div>
                                <div class="course-details">
                                    
                                    {!!$courseDetalis->longtitle!!}
                                    <div class="seat">
                                        <p><a href="{{route('Adform.all')}}">Admission Going On</a></p>
                                    </div>
                                   
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 d-lg-none d-md-none">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="related-course">
                                <div class="course-info">
                                    <h3>Other Related Courses</h3>
                                </div>
                                <ul class=" ">
                                    @foreach ($subCategory as $item)
                                        @foreach ($item->post as $element)
                                        <li class="">
                                            <a href="{{url('courseDetalis/' . $element->slug)}}" >
                                                <i class="fa fa-angle-right"></i>
                                                <span>{{$item->name}}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                                </div>

                        <div class="col-lg-12 px-lg-0  col-md-8 m-md-auto">
                            <div class="counseling-form">
                                <h3>Career Counselling</h3>
                                <form action="{{route('counsell.allstore')}}" method="post">
                                    @csrf
                                   <input type="text" placeholder="Your Name" name="name" value="" class="form-control  ">
                                   <input type="email" placeholder="Email Address" name="email" value="" class="form-control  ">
                                   <input type="number" placeholder="Phone Number" name="phone" value="" class="form-control  ">
                                   <button type="submit" name="submit" class="btn form-control ">submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ========= About  Part End Here ========== -->


	  
	   <!-- ========= Footer Part Start Here ========== -->
	
	   <!-- ========= Footer Part End Here ========== -->
    
@endsection