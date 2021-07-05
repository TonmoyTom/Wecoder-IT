@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Contact View')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Mail Send</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                               
                      
                  
                                
                                  <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Name</label>
                                  <input type="name" class="form-control" id="name" name="name" placeholder="Name " value="{{$contact->name}}">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email "  value="{{$contact->email}}">
                                  </div>
                                 
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Message</label>
                                    <textarea id="summernote" name="message" col="60" row4="10"  style="border-color: aqua;">{{$contact->message}}</textarea>
                                </div>
                                  
                         
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection