@extends('layouts.admin-home')
@section('title', 'Wecoder-It ||  Banner View')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Banner View</h4>
                  
                              
                               
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Name</label>
                                    <input type="text" class="form-control" name="name" style="color: #000;" value="{{$banner->name}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;" value="{{$banner->slug}}">
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Images</label>
                                    <br>
                                    <img src=" {{asset('/Image/Banner/'.$banner->imagename)}}" width="200px" height="100px;">
                                  </div>
                                  

                              
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection