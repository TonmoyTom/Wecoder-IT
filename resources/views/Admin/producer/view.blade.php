@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Producer View')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Producer View</h4>
                  
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
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Category Name"
                                         value="{{$about->slug}}">
                                      </div>
                      
                                      <div class="form-group">
                                          <label for="recipient-name" class="col-form-label" style="color: #000;">Short Title</label><br>
                                          <textarea id="summernote" name="aboutsdetalis" col="100" row4="20"  style="border-color: aqua;">{{$about->addmissiondetalis}}</textarea><br> 
                                          
                                    </div>
                              
                            </form>
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection