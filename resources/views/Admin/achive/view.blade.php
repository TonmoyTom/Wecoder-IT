@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Achive View')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Achive View</h4>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Name</label>
                                    <input type="text" class="form-control" name="name" style="color: #000;" value="{{$achive->name}}" >
                  
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;" value="{{$achive->slug}}">
                                     
                  
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Short Title</label><br>
                                    <textarea id="summernote" name="shottitle" col="60" row4="10"  style="border-color: aqua;">
                                        {{$achive->shottitle}}
                                    </textarea><br> 
                                  </div>
                              
                        
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection