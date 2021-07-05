@extends('layouts.app')
@section('title', 'Wecoder-it | Admission Procedure')

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
                        <a href="{{route('home.producer')}}"><span>Admission Procedure</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->
<!-- ========= About  Part Start Here ========== -->

<section id="addmission-tab-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                            <div class="online-pro">
                               @foreach ($producer as $item)

                               {!! $item->addmissiondetalis !!}
                            
                               @endforeach
                            </div> 
                </div>
            </div>
        </div>
    </section>

<!-- ========= About  Part End Here ========== -->


	  
	   <!-- ========= Footer Part Start Here ========== -->
	   <!-- ========= Footer Part End Here ========== -->


@endsection