@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Achive Create')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Achive Create</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('Achive.allstore')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Name</label>
                                    <input type="text" class="form-control" name="name" style="color: #000;">
                  
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;">
                  
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Short Title</label><br>
                                    <textarea id="summernote" name="shottitle" col="60" row4="10"  style="border-color: aqua;"></textarea><br> 
                                    <p style="color:red"> Ex: Must Be 65 Words  </p>
                  
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                              <div class="">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection