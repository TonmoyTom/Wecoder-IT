@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Facilities View')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Facilities Edit</h4>
                                <div class="">
                                
                                   
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder=" Name"
                                         value="{{$facilites->name}}">
                                        </div>
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$facilites->slug}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Images</label>
                                            <input type="file" class="dropify" name="imagename"  />
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Images</label><br>
                                            <a class="venobox" data-gall="gallery01" title="{{$facilites->imagename}}" href="{{asset('Image/Facilities/'.$facilites->imagename)}}"><img src="{{asset('Image/Facilities/'.$facilites->imagename)}}" height="100px" width="100px"></a>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Description</label>
                                            <textarea id="summernote" name="detalis" col="60" row4="10"  style="border-color: aqua; color:#000;" >{{$facilites->detalis}}</textarea><br> 
                                            <p style="color:red"> Ex: Must Be 250 Words  </p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        </div>
                               
                                  </div>
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection