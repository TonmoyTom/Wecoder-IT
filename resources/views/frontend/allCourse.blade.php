@extends('layouts.app')
@section('title', 'Wecoder-it | Course')

@section('content')


<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1>Course</h1>
                    <p>
                        <a href="{{route('index')}}">Home</a>
                      <i class="fas fa-angle-double-right"></i>
                        <a href="{{route('home.allcourse')}}"><span>Course</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->



<!-- ========= Course Part Start Here ========== -->
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
            <div class="row tabs">
                <div class="col-lg-4 col-sm-12 col-md-8 " style="margin-top: 50px;">
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
                             @foreach ($item->post as $element)
                             <div class="table_design">
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
                                                <p><a href="{{route('Adform.all')}}">Admission Going On</a></p>
                                         </div>
                                    </div>
                                </div>
                             </div>
                             @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </section>



<!-- ========= Course Part End Here ========== -->
	  
	   <!-- ========= Footer Part Start Here ========== -->
	   
	   <!-- ========= Footer Part End Here ========== -->


@endsection