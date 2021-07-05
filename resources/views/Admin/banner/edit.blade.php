@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Banner Edit')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Banner Edit</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{url('admin/banners/edit/'.Crypt::encrypt($banner->id))}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Name</label>
                                    <input type="text" class="form-control" name="name" style="color: #000;" value="{{$banner->name}}">
                  
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;" value="{{$banner->slug}}">
                                    <p style="color:red"> Ex: Blog_image</p>
                  
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Images</label>
                                    <br>
                                    <img src=" {{asset('/Image/Banner/'.$banner->imagename)}}" width="200px" height="100px;">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Images</label>
                                    <input type="file" class="dropify" name="imagename" data-max-height="1000" />
                  
                                    @error('email')
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