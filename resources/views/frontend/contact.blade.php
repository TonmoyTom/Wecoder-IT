@extends('layouts.app')
@section('title', 'Wecoder-it|About-Us')

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
                        <a href="{{route('home.contact')}}"><span>Contact</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->
<!-- ========= About  Part Start Here ========== -->

<section id="about">
	<div class="container">
		<div class="row" >
			<div class="col-lg-12">
				@foreach ($about as $item)
                <div class="about-overview">
                    <p>{{$item->aboutsdetalis}}</p>
                </div>
                @endforeach
			</div>
		</div>
	</div>
</section>
<!-- ========= About  Part End Here ========== -->


	  
	   <!-- ========= Footer Part Start Here ========== -->
	   
	   <!-- ========= Footer Part End Here ========== -->
    
@endsection