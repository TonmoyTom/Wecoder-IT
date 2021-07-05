@php
$category = DB::table('categories')->where(['status' => 1, 'approve' => 1])->get();


@endphp

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
  	<link rel="stylesheet" href="{{mix('css/all.css')}}">

    <title>@yield('title')</title>


  </head>
  <body>
	  <section class="logohead" class="d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3">
                <div class="logo">
                    <a href="{{route('index')}}"><img src="{{asset('frontend/images/logo.png')}}" alt="Wecoder-ITLogo"  class="img-fluid"></a>
                     
                </div>
            </div>
            <div class="col-lg-8 text-right  col-md-9">
                <div class="row">
                    <div class="col-lg-12 col-md-5 text-right ">
                        <div class="contact-no">
                        	<ul class="header-buttons">
							<li><a class="btn-nav-line" href="{{route('contacts.all')}}">Contact</a></li>
							<li><a class="btn-nav-support" href="{{route('home.support')}}">Support</a></li>
						</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- End header -->

    <!-- Start Mobile Version Nav -->

	<div class="mobile-version" id="navbar">
		<nav class="navbar navbar-expand-lg navbar-light ">
	  <div class="logo">
			 <a href=""><img src="{{asset('frontend/images/logo.png')}}" alt="Wecoder-ITLogo"  class="img-fluid"></a>
		 </div>
	   <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <div id="nav-icon1">
		   <span></span>
		   <span></span>
		   <span></span>
		 </div>		  
	  </button>
		   <div class="collapse navbar-collapse" id="navbarSupportedContent">
		 <ul class="navbar-nav mr-auto">
		   <li class="nav-item">
			 <a class="nav-link {{Request::is('/')?'active':''}}" aria-current="page" href="{{route('index')}}">Home</a>
		 </li>
		   <li class="nav-item">
			 <a class="nav-link {{Request::is('about-us')?'active':''}}" href="{{route('home.about')}}">About</a>
		   </li>
		   <li class="nav-item dropdown">
			<a href="{{route('home.allcourse')}}" class=" nav-link {{ (request()->is('allCourse')) ? 'active' : '' }} dropdown-toggle" data-hover="dropdown">Course
				   <i class="fas fa-angle-down"></i>
			</a>
			 <ul class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdownMenuLink"  role="menu" aria-labelledby="dLabel">
				 @foreach ($category as $item)
				 <li class="dropdown-submenu" >
					 <a class="dropdown-item dropdown-toggle" href="javascript:void(0)" style="cursor: default;">{{$item->name}}
					<i class="fas fa-angle-right"></i>
					</a>

				
						@php
							$ids = $item->id;
							$subcategory = App\Subcategory::with('post')->where(['status' => 1, 'approve' => 1,'category_id' => $ids])->get();
						@endphp
					@foreach ($subcategory as $subitem)
						@foreach ($subitem->post as $item)
							<li><a class="dropdown-item " style="margin-left: 40px;" href="{{url('courseDetalis/' . $item->slug)}}">{{$subitem->name}}</a></li> 
						@endforeach

					@endforeach
					
				</li>
				 @endforeach
				
				 
			  </ul>
		  </li> 
		 
			  
		   <li class="nav-item dropdown">
			 <a class="nav-link dropdown-toggle btn_body" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			   Admission
				<i class="fas fa-angle-down"></i>
			 </a>
			  <ul class="dropdown-menu animate slideIn {{ (request()->is('addmissionForm') || request()->is('Addmission-producer')) ? 'active' : '' }}" aria-labelledby="navbarDropdownMenuLink">
				 <li><a class="dropdown-item {{ (request()->is('addmissionForm')) ? 'active' : '' }}" href="{{route('Adform.all')}}">Admission Form</a></li>
				 <li><a class="dropdown-item {{ (request()->is('Addmission-producer')) ? 'active' : '' }}" href="{{route('home.producer')}}">Admission Producer</a></li>
			   </ul>
		   </li>
		   <li class="nav-item">
			<a class="nav-link {{ (request()->is('job-Placement')) ? 'active' : '' }}" href="{{route('home.placement')}}">Job Placement</a>
		  </li>
		   <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle btn_body" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
				Others <i class="fas fa-angle-down"></i>
			   </a>
			   <ul class="dropdown-menu animate slideIn  {{ (request()->is('facilites') || request()->is('faq')) ? 'active' : '' }}" >
				 <li><a class="dropdown-item {{ (request()->is('facilites')) ? 'active' : '' }}" href="{{route('home.facilites')}}">Our Facilities</a></li>
				 <li><a class="dropdown-item {{ (request()->is('faq')) ? 'active' : '' }}" href="{{route('home.faq')}}">FAQ</a></li>
			   </ul>
			 </li>
			 <li class="nav-item">
			   <a class="nav-link {{ (request()->is('reviews')) ? 'active' : '' }}" href="{{route('home.reviews')}}">Freelencing</a>
			 </li>
			  <li class="nav-item">
			   <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{route('contacts.all')}}">Contact</a>
			 </li>
			  <li class="nav-item ">
			   <a class="nav-link btn-nav {{ (request()->is('semeniar')) ? 'active' : '' }}" href="{{route('home.semeniar')}}">Semenier</a>
			 </li>
			 <li class="nav-item ">
			   <a class="nav-link btn-nav " href="{{route('contacts.all')}}">Login</a>
			 </li>
			 <li class="nav-item ">
			   <a class="nav-link btn-nav" href="{{route('home.support')}}">Support</a>  
			 </li>
		 </ul>
		
	   </div>
	 </nav>
	 </div>
<!-- End Mobile Version Nav -->
<!-- Start desktop Version Nav -->
<div class="navigationwarp" id="navbar">
 <nav class="navbar navbar-expand-lg navbar-light">
 <div class="container">
	 <div class="collapse navbar-collapse"  id="navbarSupportedContent">
	   <ul class="navbar-nav m-auto">
		 <li class="nav-item ">
			 <a class="nav-link {{Request::is('/')?'active':''}}"  href="{{route('index')}}">Home</a>
		 </li>
		 <li class="nav-item">
		   <a class="nav-link {{Request::is('about-us')?'active':''}}" href="{{route('home.about')}}">About</a>
		 </li>
		 <li class="nav-item dropdown">
			<a href="{{route('home.allcourse')}}" class=" nav-link dropdown-toggle {{ (request()->is('allCourse')) ? 'active' : '' }}" data-hover="dropdown">Course
				   <i class="fas fa-angle-down"></i>
			</a>
			 <ul class="dropdown-menu animate slideIn" aria-labelledby="navbarDropdownMenuLink"  role="menu" aria-labelledby="dLabel">
				 @foreach ($category as $item)
				 <li class="dropdown-submenu" >
					 <a class="dropdown-item dropdown-toggle" href="javascript:void(0)" style="cursor: default;"  >{{$item->name}}
					<i class="fas fa-angle-right"></i>
					</a>

					@php
						$ids = $item->id;
						$subcategory = App\Subcategory::with('post')->where(['status' => 1, 'approve' => 1,'category_id' => $ids])->get();
					@endphp
 					<ul class="dropdown-menu">
					 @foreach ($subcategory as $subitem)
						@foreach ($subitem->post as $item)
						<li><a class="dropdown-item " href="{{url('courseDetalis/' . $item->slug)}}">{{$subitem->name}}</a></li> 
						@endforeach
						
					 @endforeach
					</ul>
					
				</li>
				 @endforeach
				
				 
			  </ul>
		  </li>

		 <li class="nav-item dropdown ">
		   <a class="nav-link  {{ (request()->is('addmissionForm') || request()->is('Addmission-producer')) ? 'active' : '' }} dropdown-toggle btn_body " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
			Admission

			 <i class="fas fa-angle-down"></i>
		   </a>
		   <ul class="dropdown-menu  animate slideIn " aria-labelledby="navbarDropdownMenuLink">
			 <li><a class="dropdown-item {{ (request()->is('addmissionForm')) ? 'active' : '' }}" href="{{route('Adform.all')}}">Admission Form</a></li>
			 <li><a class="dropdown-item {{ (request()->is('Addmission-producer')) ? 'active' : '' }}" href="{{route('home.producer')}}">Admission Producer</a></li>
		   </ul>
		 </li>
		  <li class="nav-item">
		   <a class="nav-link {{ (request()->is('job-Placement')) ? 'active' : '' }}" href="{{route('home.placement')}}">Job Placement</a>
		 </li>

		 <li class="nav-item   dropdown">
			<a class="nav-link {{ (request()->is('facilites') || request()->is('faq')) ? 'active' : '' }} dropdown-toggle btn_body" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false" >
			Others <i class="fas fa-angle-down"></i>
		   </a>
		   <ul class="dropdown-menu  animate slideIn" >
			 <li><a class="dropdown-item {{ (request()->is('facilites')) ? 'active' : '' }}" href="{{route('home.facilites')}}">Our Facilities</a></li>
			 <li><a class="dropdown-item {{ (request()->is('faq')) ? 'active' : '' }}" href="{{route('home.faq')}}">FAQ</a></li>
		   </ul>
		 </li>
		 <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle btn_body" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false" >
			Freelencing <i class="fas fa-angle-down"></i>
		   </a>
		   <ul class="dropdown-menu animate slideIn" >
			 <li><a class="dropdown-item {{ (request()->is('reviews')) ? 'active' : '' }}" href="{{route('home.reviews')}}">Student Review</a></li>
		   </ul>
		 </li>
		  <li class="nav-item">
		   <a class="nav-link {{ (request()->is('contact')) ? 'active' : '' }}" href="{{route('contacts.all')}}">Contact</a>
		 </li>
		  <li class="nav-item ">
		   <a class="nav-link btn-nav {{ (request()->is('semeniar')) ? 'active' : '' }}" href="{{route('home.semeniar')}}">Semenier</a>
		 </li>

		 
		 
	   </ul>
	 </div>
 </div>	  
</nav>
</div>
<!-- End Nav -->

	<!-- Start Back top   -->
	 <!-- Start Back top   -->
	 <a href="#" class="back2 arrow" >
		<i class="fas fa-angle-double-up"></i>
	   </a>
	 <!-- Start Back top   -->
<!-- Start Back top   -->


    @yield('content')

	@include('layouts.footter')
       
   

	<script type="text/javascript" src="{{mix('js/all.js')}}"></script>

    <script src="https://kit.fontawesome.com/417824116f.js"></script>
	
     

  </body>
</html>
