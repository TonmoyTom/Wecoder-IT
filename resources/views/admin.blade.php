@extends('layouts.admin-home')

@section('content')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight px-3 py-3">
            <h4 class="mb-2">All User </h4>
            <div class="progress" style="height: 16px;">
              <div
                class="progress-bar bg-warning text-mattBlackDark"
                role="progressbar"
                style="width:  {{$allDashboardCount->admin}}%;"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              >
                {{$allDashboardCount->admin}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight px-3 py-3">
            <h4 class="mb-2">Total  Post</h4>
            <div class="progress" style="height: 16px;">
              <div
                class="progress-bar bg-info text-mattBlackDark"
                role="progressbar"
                style="width: {{$allDashboardCount->post}}%;"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              >
              {{$allDashboardCount->post}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight p-3">
            <h4 class="mb-2">Total New Conatct </h4>
            <div class="progress" style="height: 16px;">
              <div
                class="progress-bar bg-success"
                role="progressbar"
                style="width: {{$allDashboardCount->contact}}%;"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              >
              {{$allDashboardCount->contact}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight p-3">
            <h4 class="mb-2">Total New Counselling</h4>
            <div class="progress" style="height: 16px;">
              <div
                class="progress-bar bg-success"
                role="progressbar"
                style="width:{{$allDashboardCount->counsell}}%;"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              >
              {{$allDashboardCount->counsell}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight p-3">
            <h4 class="mb-2">Total Review</h4>
            <div class="progress" style="height: 16px;">
              <div
                class="progress-bar bg-success"
                role="progressbar"
                style="width:{{$allDashboardCount->review}}%;"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              >
              {{$allDashboardCount->review}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-3">
          <div class="bg-mattBlackLight p-3">
            <h4 class="mb-2">Total Addmission  </h4>
            <div class="progress" style="height: 16px;">
              <div
                class="progress-bar bg-success"
                role="progressbar"
                style="width: {{$allDashboardCount->adform}}%;"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100"
              >
              {{$allDashboardCount->adform}}
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


