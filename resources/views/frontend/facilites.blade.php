@extends('layouts.app')
@section('title', 'Wecoder-it | Facilities')

@section('content')


<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1>Admission Procedure</h1>
                    <p>
                        <a href="{{route('home')}}">Home</a>
                       <i class="fas fa-angle-double-right"></i>
                        <a href="{{route('home.facilites')}}"><span>Facilities</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->

  <!-- ========= Facilities Part Start Here ========== -->

  <section id="faciltes">
    <div class="container">
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



	  
	   
	   <!-- ========= Footer Part End Here ========== -->


@endsection