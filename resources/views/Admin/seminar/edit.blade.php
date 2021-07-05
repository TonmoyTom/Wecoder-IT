@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Seminar Edit ')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Seminar Edit</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{url('admin/seminars/edit/'.Crypt::encrypt($seminer->id))}}" method="POST"  >
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Slug Name" value="{{$seminer->slug}}">
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Topic</label>
                                        <input type="text" class="form-control" name="topic" placeholder="Topic Name" value="{{$seminer->topic}}">
                                        </div>
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Date</label>
                                        <input type="text" class="form-control" id="datetimepicker1" name="datetime" placeholder="Date Time" value="{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $seminer->datetime)->format('d-M-y g:i A')}}">
                                        </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Live Link</label>
                                        <input type="text" class="form-control" name="vedio_link" placeholder="Vedio Link" value="{{$seminer->vedio_link}}">
                                        <a href=""><small class="text-success">Go to Facbook  Live Vedio Link Setting</small></a>
                                        </div>
                    
                                        <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Join Link</label>
                                        <input type="text" class="form-control" name="join_link" placeholder="Join Link" value="{{$seminer->join_link}}">
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