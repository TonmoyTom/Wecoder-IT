@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Logo Edit')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Logo Edit</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{url('admin/logos/edit/'.Crypt::encrypt($logos->id))}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;" value="{{$logos->slug}}">
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Images</label>
                                    <br>
                                    <img src=" {{asset('/Image/Logo/'.$logos->imagename)}}" width="200px" height="100px;">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Images</label>
                                    <input type="file" class="dropify" name="imagename" data-max-height="1000" />                                 
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