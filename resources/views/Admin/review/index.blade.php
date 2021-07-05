@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Review')
@section('content')
<main>
<div class="row justify-content-center">
  <div class="col-lg-11">
    <div class="page-header">
      <h3 class="page-title" style="margin-top: 15px;">
        Review
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Wecoder-IT</a></li>
          <li class="breadcrumb-item active" aria-current="page">Review Data </li>
        </ol>
       
      </nav>

    </div>
    <div class=>
<!-- Button trigger modal -->
    @if(Auth::guard('admin')->user()->can('reviews.create'))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px;">
        Add Reviews
      </button>

      @else
        <a>Non-Approve</a>
      @endif

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Reviews</h5>
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
              <form action="{{ route('reviews.allstore')}}" method="POST">
                  @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Review Link</label>
                  <input type="text" class="form-control"  placeholder=" Review Link">
                  <textarea id="summernote" name="link"  col="60" row4="10"  style="border-color: aqua; color:#000;" ></textarea>
                </div>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Review  Link Slug ">
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
        <h4 class="card-title">Reviews table</h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="myTable" class="table">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Slug </th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Admin-Approve</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count=0; @endphp
                  @foreach($reviews as $item)
                  @php $count+=1 @endphp
                  <tr>
                      <td>{{$count}}</td>
                      <td>{{$item->slug}}</td>
                      <td>{{$item->link}}</td>

                      <td>
                        @if($item->status == 1)
                        <a href="javascript:void(0)" class=" updatereviewstatus" id="review-{{$item->id }}"
                           section_id ="{{$item->id}}" >Active</a>
                        @else
                        <a  href="javascript:void(0)" class=" updatereviewstatus" id="review-{{$item->id }}"
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
                            @if(Auth::guard('admin')->user()->can('reviews.edit'))
                            <a class="btn btn-info "  href="{{url('admin/reviews/edit/'.Crypt::encrypt($item->id))}}" >Edit<a>
                              @else
                                <a>Non-Approve</a>
                              @endif

                              @if(Auth::guard('admin')->user()->can('reviews.delete'))
                              <form action="{{url('admin/reviews/delete/'.Crypt::encrypt($item->id))}}" method="post">
                                @method('delete')     
                                @csrf
                                  <button type="submit"  data-name="{{ $item->slug }}" class="btn btn-danger btn-icon-text right delete-confirm"> 
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