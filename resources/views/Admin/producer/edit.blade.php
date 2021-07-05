@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Producer Edit')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Producer Edit</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{url('admin/addmissionproducers/edit/'.Crypt::encrypt($about->id))}}" method="POST"  >
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Category Name"
                                         value="{{$about->slug}}">
                                      </div>
                      
                                      <div class="form-group">
                                          <label for="recipient-name" class="col-form-label" style="color: #000;">Short Title</label><br>
                                          <textarea id="summernote" name="addmissiondetalis" col="60" row4="10"  style="border-color: aqua;">{{$about->addmissiondetalis}}</textarea><br> 
                                          
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