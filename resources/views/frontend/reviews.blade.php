@extends('layouts.app')
@section('title', 'Wecoder-it| Student Reviews')

@section('content')
     <!-- ========= breadcrumb Part End Here ========== -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1>Review</h1>
                    <p>
                        <a href="{{route('home')}}">Home</a>
                       <i class="fas fa-angle-double-right"></i>
                        <a href="{{route('home.reviews')}}"><span>Student Review</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->
<!-- ========= About  Part Start Here ========== -->

<section id="preview" class="preview">
	<div class="container" id="preview-main">

		<div class="row ">
			@foreach ($review as $item)
			<div class="col-lg-6 pb-5 pb-lg-0">
				<div class="preview-details preview-details-extra">
				  <div class="fb-post" data-href="{{$item->link}}" data-width="" data-show-text="true">
					{!!$item->link!!}
				</div>
				</div>
			</div>
			@endforeach
			
			
		</div>
	</div>
</section>
<!-- ========= Preview Part End Here ========== -->
<!-- ========= About  Part End Here ========== -->


	  
	  
    
@endsection