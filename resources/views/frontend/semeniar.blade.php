@extends('layouts.app')
@section('title', 'Wecoder-it | Semenier')

@section('content')


<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1>Semenier</h1>
                    <p>
                        <a href="{{route('home')}}">Home</a>
                        <i class="fas fa-chevron-right"></i>
                        <a href="{{route('home.semeniar')}}"><span>Semenier</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->
<!-- ========= Semenier  Part Start Here ========== -->
<section id="upcoming-seminar" class="pb-0+">
    <div class="container seminar-form-main">
      <div class="row">
        <div class="col-lg-12">
          <div class="common-head seminarform-head text-center">
              <h2>Upcoming Seminars/Workshops</h2>
              <p>Explore the weapons of Latest Information Technology!</p>
          </div>
        </div>
        <div class="col-lg-10 m-auto">
          <div class="row">
              <div class="col-lg-12">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#seminar-collaps" aria-expanded="true" aria-controls="seminar-collaps1">
                                Click Here to know our upcoming Seminars
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
  
                        <div id="seminar-collaps" class="collapse" aria-labelledby="seminar-collaps1" data-parent="#accordionExample">
                            <div class="card-body spn_block">
                              <div class="row">
                                <div class="col-lg-12 seminar-table">
                                  <table class="table table-striped mt-3 table-bordered">
                                    <thead>
                                      <tr>
                                        <th bgcolor="#fff" scope="col">Topic</th>
                                        <th bgcolor="#fff" scope="col">Date</th>
                                        <th bgcolor="#fff" scope="col">Time</th>
                                        <th bgcolor="#fff" scope="col">Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($semeniar as $item)
                                        <tr>
                                            <td>{{$item->topic}}</td>
                                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->datetime)->format('l , F Y')}}</td>
                                            <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->datetime)->format('g:i A')}}</td>
                                            <td>
                                                <a class="join" href="{{$item->join_link}}">Join </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="accordion" id="accordionExample1">
                  <div class="card">
                      <div class="card-header" id="headingOne1">
                          <button class="btn  collapsed" type="button" data-toggle="collapse" data-target="#workshop-collaps" aria-expanded="true" aria-controls="workshop-collaps1">
                              Click Here to know our upcoming Workshops
                              <i class="fas fa-chevron-down"></i>
                          </button>
                      </div>
  
                      <div id="workshop-collaps" class="collapse" aria-labelledby="workshop-collaps1" data-parent="#accordionExample1">
                          <div class="card-body spn_block">
                            <div class="row">
                              <div class="col-lg-12 seminar-table">
                                <table class="table table-striped mt-3 table-bordered">
                                  <thead>
                                    <tr>
                                      <th bgcolor="#fff" scope="col">Topic</th>
                                      <th bgcolor="#fff" scope="col">Date</th>
                                      <th bgcolor="#fff" scope="col">Time</th>
                                      <th bgcolor="#fff" scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                                                        <tr>
                                        <td colspan="50">List will be uploaded soon!</td>
                                      </tr>
                                                                    </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
      <!-- ========= Seminar Part End Here ========== -->


	  
	   <!-- ========= Footer Part Start Here ========== -->

	   <!-- ========= Footer Part End Here ========== -->


@endsection