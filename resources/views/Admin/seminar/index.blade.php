@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Seminar ')
@section('content')
<main>
<div class="row justify-content-center">
  <div class="col-lg-11">
    <div class="page-header">
      <h3 class="page-title" style="margin-top: 15px;">
        Seminar
      </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Tables</a></li>
          <li class="breadcrumb-item active" aria-current="page">Seminar Data</li>
        </ol>
       
      </nav>

    </div>
    <div class=>
<!-- Button trigger modal -->

    @if(Auth::guard('admin')->user()->can('seminars.create'))
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px;">
        Add Seminer
      </button>

      @else
        <a>Non-Approve</a>
      @endif

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Seminer</h5>
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
              <form action="{{ route('seminars.allstore')}}" method="POST">
                  @csrf
               
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Slug</label>
                  <input type="text" class="form-control" name="slug" placeholder="Slug Name">
                </div>

                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Topic</label>
                    <input type="text" class="form-control" name="topic" placeholder="Topic Name">
                  </div>
                  <div class="form-group"  >
                    <label for="recipient-name" class="col-form-label">Date</label>
                    <input type="text"   class="form-control " id="datetimepicker1" name="datetime" placeholder="">
                  </div>
                 
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Live Link</label>
                    <input type="text" class="form-control" name="vedio_link" placeholder="Vedio Link">
                    <a href=""><small class="text-success">Go to Facbook  Live Vedio Link Setting</small></a>
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Join Link</label>
                    <input type="text" class="form-control" name="join_link" placeholder="Join Link">
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
        <h4 class="card-title">Seminars table</h4>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="myTable" class="table">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Topic</th>
                      <th>Date Time</th>
                      <th>Vedio Link</th>
                      <th>Join Link</th>
                      <th>Admin-Approve</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @php $count=0; @endphp
                  @foreach($seminars as $item)
                  @php $count+=1 @endphp
                  <tr>
                      <td>{{$count}}</td>
                      <td>{{$item->topic}}</td>
                      <td>{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->datetime)->format('d-M-y g:i A')}}</td>
                      <td>{{$item->vedio_link}}</td>
                      <td>{{$item->join_link}}</td>
                      <td style="text-align: center;">
                        @if($item->approve == 1)
                        <a >Approve</a>
                        @else
                        <a>Non-Approve</a>
                        @endif
                      </td>
                      <td>
                      
                          <div class="btn-group">
                            @if(Auth::guard('admin')->user()->can('seminars.edit'))
                            <a class="btn btn-info editsem"  href="{{url('admin/seminars/edit/'.Crypt::encrypt($item->id))}}" >Edit<a>
                              @else
                              <a>Non-Approve</a>
                               @endif
                               @if(Auth::guard('admin')->user()->can('seminars.view'))
                              <a class="btn btn-warning "  href="{{url('admin/seminars/view/'.Crypt::encrypt($item->id))}}" >View<a>
                                @else
                                <a>Non-Approve</a>
                                @endif

                                @if(Auth::guard('admin')->user()->can('seminars.delete'))
                              <form action="{{url('admin/seminars/delete/'.Crypt::encrypt($item->id))}}" method="post">   
                                @csrf
                                  <button type="submit" data-name="{{$item->slug}}" class="btn btn-danger btn-icon-text right delete-confirm"> 
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