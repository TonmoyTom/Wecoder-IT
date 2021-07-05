@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Post Create')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Post Create</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                                <form action="{{route('posts.allstore')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Post Name</label>
                                    <input type="text" class="form-control" name="name" style="color: #000;">
                  
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Post Slug</label>
                                    <input type="text" class="form-control" name="slug" style="color: #000;">
                                  </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Category</label>
                                    <select class="form-control" name="category_id" id="category_id">>
                                        <option>Select</option>
                                            @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                       
                                      </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">SubCategory</label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id"></select>
                                    </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">MainPost Images</label>
                                    <input type="file" class="dropify" name="imagename" data-max-height="1000" />
                                    
                  
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label " style="color: #000;">Font Page  Images Show </label>
                                    <input type="file" class="dropify" name="imagename2" data-max-height="1000" />
                                    <p style="color:red"> Forntend Section  </p>
                  
                                  </div>


                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Short Title</label><br>
                                    <textarea id="summernote" name="shottitle" col="60" row4="10"  style="border-color: aqua;">
                                    </textarea><br> 
                                    <p style="color:red"> Optional</p>
                                    
                                  </div>

                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Long Title</label><br>
                                    <textarea id="summernote1" name="longtitle" col="60" row4="10"  style="border-color: aqua;"></textarea><br> 
                                    
                                  </div>

                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="front" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                      Frontend Section
                                    </label>
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