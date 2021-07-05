@extends('layouts.admin-home')
@section('title', 'Wecoder-It Banner')
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
                               
                      
                  
                                <form action="{{url('admin/addmission/edit/'.Crypt::encrypt($addmission->id))}}" method="POST" >
                                    @csrf
                                  <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Name</label>
                                  <input type="name" class="form-control" id="name" name="name" placeholder="Name " value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email "  value="{{$addmission->email}}">
                                  </div>
                                  <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Subject</label>
                                      <input type="text" class="form-control" id="phone" name="subject" placeholder=" Subject"  value="">
                                  </div>
                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Message</label>
                                    <textarea id="summernote" name="message" col="60" row4="10"  style="border-color: aqua;"></textarea>
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
    <main
@endsection