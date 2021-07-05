@extends('layouts.app')
@section('title', 'Wecoder-it | Job-Placement')

@section('content')

<!-- ========= breadcrumb Part End Here ========== -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1>Job Placements</h1>
                    <p>
                        <a href="{{route('home')}}">Home</a>
                       <i class="fas fa-angle-double-right"></i>
                        <a href="{{route('home.placement')}}"><span>Job Placements</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->
<!-- ========= About  Part Start Here ========== -->


<!-- ========= About  Part End Here ========== -->
<section id="mission_part">
        <div class="container">
            <div class="row job_pla_cont pt-lg-5">
                <div class="col-lg-12 col-12 col-md-6">
                    @foreach ($placement as $item)

                    {!! $item->jobsdetalis !!}
                 
                    @endforeach
                </div>
            </div>
        </div>
    </section>

	  
	   <!-- ========= Footer Part Start Here ========== -->
	   <!-- ========= Footer Part End Here ========== -->



@endsection