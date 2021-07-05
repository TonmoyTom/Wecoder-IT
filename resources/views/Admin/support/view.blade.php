@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Support View ')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">Support View</h4>
                  
                                
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="slug" placeholder="Category Name"
                                         value="{{$support->slug}}">
                                      </div>
                      
                                      <div class="form-group">
                                          <label for="recipient-name" class="col-form-label" style="color: #000;">All Support</label><br>
                                          <textarea id="summernote" name="jobsdetalis" col="60" row4="10"  style="border-color: aqua;">{{$support->support}}</textarea><br> 
                                          
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" placeholder="Facebook link" value="{{$support->facebook}}">
                                        <p class="danger">www.facebook.com<p>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" placeholder="Twitter link"  value="{{$support->twitter}}">
                                        <p class="danger">www.Twitter.com<p>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Linkdin</label>
                                        <input type="text" class="form-control" name="linkdin" placeholder="Linkdin link" value="{{$support->linkdin}}">
                                        <p class="danger">www.linkdin.com<p>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Google Plus</label>
                                        <input type="text" class="form-control" name="googleplus" placeholder="Google Plus link" value="{{$support->googleplus}}">
                                        <p class="danger">www.facebook.com<p>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Github</label>
                                        <input type="text" class="form-control" name="github" placeholder="Github link" value="{{$support->github}}">
                                        <p class="danger">www.Github.com<p>
                                      </div>
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection