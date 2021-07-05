@extends('layouts.admin-home')
@section('title', 'Wecoder-It || FaqDetails Edit')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">FaqDetails Edit</h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{url('admin/faqs/edit/'.Crypt::encrypt($faqs->id))}}" method="POST"  >
                                    @csrf
                                    <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Slug</label>
                                      <input type="text" class="form-control" name="slug" placeholder="Faq Name" 
                                      value="{{$faqs->slug}}">
                                    </div>
                    
                                    <div class="form-group"> 
                                        <label for="recipient-name" class="col-form-label">Qustion</label>
                                        <input type="text" class="form-control" name="qustion" placeholder="Faq Qustion"
                                        value="{{$faqs->qustion}}" >
                                      </div>
                    
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label" style="color: #000;">Answer</label><br>
                                        <textarea id="summernote" name="answer" col="60" row4="10"  style="border-color: aqua;">{{$faqs->answer}}</textarea><br> 
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Faq Category</label>
                                        <select class="form-control" name="faqs_id" id="faqs_id">
                                            @foreach ($faqtitle as $item)
                                            <option value="{{$item->id}}"
                                              <?php if($faqs->faqs_id == $item->id){
                                                  echo "selected";
                                              } ?>
                                              >{{$item->faqtitle}}</option>
                                            @endforeach
                                           
                                          </select>
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