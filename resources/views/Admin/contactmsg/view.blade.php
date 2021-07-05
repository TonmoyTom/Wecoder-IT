@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Conatct Detalis View')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;"> Conatct Detalis View</h4>
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Phone</label>
                                <input type="number" class="form-control" name="phone1" placeholder=" Phone Number" value="{{$contactmsg->phone1}}">
                                </div>
                                    
                                <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Phone</label>
                                <input type="number" class="form-control" name="phone2" placeholder=" Phone Number" value="{{$contactmsg->phone1}}">
                                <p class="danger">Optional</p>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Phone</label>
                                    <input type="email" class="form-control" name="email" placeholder=" Email" value="{{$contactmsg->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Phone</label>
                                    <input type="email" class="form-control" name="email2" placeholder=" Email" value="{{$contactmsg->email2}}">
                                    <p class="danger">Optional</p>
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Address</label><br>
                                    <textarea id="summernote" name="address" col="60" row4="10"  style="border-color: aqua;">
                                        {{$contactmsg->address}}
                                    </textarea> 
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label" style="color: #000;">Detalis</label><br>
                                    <textarea id="summernote1" name="detalis" col="60" row4="10"  style="border-color: aqua;">
                                        {{$contactmsg->detalis}}
                                    </textarea> 
                                    
                                </div>
                             
                            </form>
                      
                  
                     
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection