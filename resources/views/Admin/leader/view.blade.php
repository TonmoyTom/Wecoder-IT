@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Leader View ')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Leader View</h4>
                                <div class="">
                                 
                                    
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder=" Name"
                                         value="{{$leaders->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="title" placeholder=" Title"
                                             value="{{$leaders->title}}">
                                            </div>
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Slug" value="{{$leaders->slug}}">
                                        </div>
                                      
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Images</label><br>
                                            <a class="venobox" data-gall="gallery01" title="{{$leaders->imagename}}" href="{{asset('Image/Leaders/'.$leaders->imagename)}}"><img src="{{asset('Image/Leaders/'.$leaders->imagename)}}" height="100px" width="100px"></a>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Description</label>
                                            <textarea id="summernote" name="detalis" col="60" row4="10"  style="border-color: aqua; color:#000;" >{{$leaders->detalis}}</textarea><br> 
                                            <p style="color:red"> Ex: Must Be 250 Words  </p>
                                        </div>
                                    </form>
                                  </div>
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection