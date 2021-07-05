@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Review Edit')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Review Edit</h4>
                                <div class="">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{url('admin/reviews/edit/'.Crypt::encrypt($reviews->id))}}" method="POST">
                                        @csrf
                      
                                      <
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Review Link</label>
                                        <textarea id="summernote" name="link"  col="60" row4="10"  style="border-color: aqua; color:#000;" >{{$reviews->link}}</textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="{{$reviews->slug}}">
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" name="submit" class="btn btn-success">Submit</button>
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                      </div>
                                    </form>
                                  </div>
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection