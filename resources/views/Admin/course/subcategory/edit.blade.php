@extends('layouts.admin-home')
@section('title', 'Wecoder-It || SubCategory Edit')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;">SubCategory Edit</h4>
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
                                    <form action="{{url('admin/subcategories/edit/'.Crypt::encrypt($subcategory->id))}}" method="POST">
                                        @csrf
                      
                                      <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Category</label>
                                      <select class="form-control" name="category_id" id="category_id">
                                          <option>Select</option>
                                              @foreach ($category as $item)
                                              <option value="{{$item->id}}"
                                                <?php if($subcategory->category_id == $item->id){
                                                    echo "selected";
                                                } ?>
                                                >{{$item->name}}</option>
                                              @endforeach
                                         
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">SubCategory</label>
                                        <input type="text" class="form-control" name="sname" value="{{$subcategory->name}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Slug</label>
                                        <input type="text" class="form-control" name="sslug" value="{{$subcategory->slug}}">
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