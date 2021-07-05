@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Contact Detalis ')
@section('content')
<main>
<div class="row justify-content-center">
  <div class="col-lg-11">
    <div class="page-header">
      <h3 class="page-title" style="margin-top: 15px;">
        Contact Detalis
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact Detalis Data</li>
        </ol>
       
      </nav>

    </div>
    <div class=>
<!-- Button trigger modal -->
    @if(Auth::guard('admin')->user()->can('contactdetalis.create'))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px;">
        Add Contact Detalis
      </button>

      @else
      <a>Non-Approve</a>
      @endif


      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add About</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form action="{{ route('contactdetalis.allstore')}}" method="POST">
                  @csrf
                
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Phone</label>
                  <input type="number" class="form-control" name="phone1" placeholder=" Phone Number">
                </div>
                    
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Phone</label>
                  <input type="number" class="form-control" name="phone2" placeholder=" Phone Number">
                  <p class="danger">Optional</p>
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Phone</label>
                    <input type="email" class="form-control" name="email" placeholder=" Email">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Phone</label>
                    <input type="email" class="form-control" name="email2" placeholder=" Email">
                    <p class="danger">Optional</p>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label" style="color: #000;">Address</label><br>
                    <textarea id="summernote" name="address" col="60" row4="10"  style="border-color: aqua;"></textarea> 
                  </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label" style="color: #000;">Detalis</label><br>
                    <textarea id="summernote1" name="detalis" col="60" row4="10"  style="border-color: aqua;"></textarea> 
                    
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
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Contacts Detalis table</h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="myTable" class="table">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Status</th>
                      <th>Admin-Approve</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count=0; @endphp
                  @foreach($contactmsg as $item)
                  @php $count+=1 @endphp
                  <tr>
                      <td>{{$count}}</td>
                      <td>{{$item->phone1}}</td>
                      <td>{{$item->email}}</td>
                      <td>
                        @if($item->status == 1)
                        <a href="javascript:void(0)" class=" updatemsgstatus" id="msg-{{$item->id }}"
                           section_id ="{{$item->id}}" >Active</a>
                        @else
                        <a  href="javascript:void(0)" class=" updatemsgstatus" id="msg-{{$item->id }}"
                          section_id ="{{$item->id}}">Deactive</a>
                        @endif
                      </td>
                      <td style="text-align: center;">
                        @if($item->approve == 1)
                        <a >Approve</a>
                        @else
                        <a>Non-Approve</a>
                        @endif
                      </td>
                      <td>
                      
                          <div class="btn-group">
                            @if(Auth::guard('admin')->user()->can('contactdetalis.edit'))
                            <a class="btn btn-info editabout"  href="{{url('admin/contactdetalis/edit/'.Crypt::encrypt($item->id))}}" >Edit<a>
                              @else
                                <a>Non-Approve</a>
                              @endif
                              @if(Auth::guard('admin')->user()->can('contactdetalis.view'))
                            <a class="btn btn-warning "  href="{{url('admin/contactdetalis/view/'.Crypt::encrypt($item->id))}}" >View<a>
                              @else
                              <a>Non-Approve</a>
                            @endif
                            @if(Auth::guard('admin')->user()->can('contactdetalis.delete'))
                              <form action="{{url('admin/contactdetalis/delete/'.Crypt::encrypt($item->id))}}" method="post">   
                                @csrf
                                  <button type="submit"   class="btn btn-danger btn-icon-text right delete-confirm"> 
                                    <i class="fas fa-trash-alt btn-icon-prepend"></i>
                                     Delete
                                  </button>   
                              </form>
                              @else
                              <a>Non-Approve</a>
                              @endif
                          </div>
                        
                      </td>
                  </tr>
               
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</main>

 

  
@endsection