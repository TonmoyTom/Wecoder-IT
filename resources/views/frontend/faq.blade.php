@extends('layouts.app')
@section('title', 'Wecoder-it | Faq')

@section('content')


<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1>Faq</h1>
                    <p>
                        <a href="{{route('index')}}">Home</a>
                       <i class="fas fa-angle-double-right"></i>
                        <a href="{{route('home.faq')}}"><span>Faq</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->
<!-- ========= FAQ Part Start Here ========== -->

<section id="faculties" class="faq-main">
    <div class="container">
        <div class="row ">
            <div class="col-lg-10 m-auto ">
                <nav class="faculty-tabs">
                    <ul class="nav nav-tabs fac-slide ">
                        @foreach ($faqparent as $item)
                        <li class="hello {{ $item->id == 1 ? 'active ' : '' }} ">
                            <a  href="#tab_{{$item->slug}}" data-toggle="tab" class= "nav-item nav-link  {{ $item->id == 1 ? 'active ' : '' }}">
                                <span>{{$item->faqtitle}}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-lg-10 m-auto">
                <div class="tab-content">
                    @foreach ($faqparent as $item)
                    <div class="tab-pane {{ $item->id == 1 ? 'active ' : '' }}" id="tab_{{$item->slug}}">
                         <div class="accordion" id="accordionExample2">
                         @foreach ($item->faq as $element)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <button class="btn " type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="true" aria-controls="collapse13">
                                        {{$element->qustion}}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>
                                <div id="collapse13" class="collapse {{ $element->id == $item->id ? 'show ' : '' }}" aria-labelledby="collapse13" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        {{Strip_tags($element->answer)}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="tab-content" >

                    @foreach ($faqparent as $item) --}}

                    {{-- <div class="tab-pane {{ $item->id == 1 ? 'active' : '' }}" id="{{$item->id}}" role="" aria-labelledby="">
                         @foreach ($item->faq as $elemenet)
                        <div class="accordion" id="accordionExample">

                            <div class="col-lg-7 col-sm-7 pr-0">
                                <div class="gd-left">
                                    <h3>{{$elemenet->qustion}}</h3>
                                </div>
                            </div> --}}


                            
                            
                             {{-- <div class="card">
                                <div class="card-header" >
                                    <button class="btn " type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapse12">
                                       {{$elemenet->qustion}}
                                        <i class="fas fa-chevron-down"></i>
                                    </button>
                                </div>

                                <div id="collapse12" class="collapse {{ $elemenet->id == 1 ? 'show ' : '' }}" aria-labelledby="collapse12" data-parent="#accordionExample">
                                    <div class="card-body">
                                       {{Strip_tags($elemenet->answer)}}
                                    </div>
                                </div>
                            </div> --}}
                             
                           
                        {{-- </div> --}}


                        
                        {{-- @endforeach
                    </div> --}}
                        
                    {{-- @endforeach --}}
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= FAQ Part End Here  ========== -->
	  
	
	   <!-- ========= Footer Part End Here ========== -->


@endsection