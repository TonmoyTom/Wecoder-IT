@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Achive Approve')
@section('content')
<main>
    <div class="container " style="margin-top: 40px;" >
        <div class="page-header">
            <h3 class="page-title">
              Achive Approve
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Wecodeit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Achive Approve</li>
              </ol>
            </nav>
          </div>
          <table id="myTable" class="table">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Slug</th>
                  <th>Status</th>
                  <th>Admin-Approve</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $count=0; @endphp
              @foreach($achiveapprove as $item)
              @php $count+=1 @endphp
              <tr>
                  <td>{{$count}}</td>
                  <td>{{$item->slug}}</td>
                  
                  <td style="text-align: center;">
                    @if($item->status == 1)
                    <a style="" href="javascript:void(0)" class=" updateachivestatus" id="achive-{{$item->id }}"
                       section_id ="{{$item->id}}" >Active</a>
                    @else
                    <a  href="javascript:void(0)" class=" updateachivestatus" id="achive-{{$item->id }}"
                      section_id ="{{$item->id}}">Deactive</a>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    @if($item->approve == 1)
                    <a href="javascript:void(0)" class=" updateachiveapprove" id="achiveApprove-{{$item->id }}"
                        section_id ="{{$item->id}}" >Active</a>
                    @else
                    <a href="javascript:void(0)" class=" updateachiveapprove" id="achiveApprove-{{$item->id }}"
                        section_id ="{{$item->id}}" >Deactive</a>
                    @endif
                  </td>
                  <td>
                    
                    <div class="btn-group">
                      @if(Auth::guard('admin')->user()->can('Achive.edit'))
                      <a class="btn btn-info" href="{{url('admin/achivement/edit/'.Crypt::encrypt($item->id))}}">Edit<a>
                        @else
                              <p>Not Access</p>
                        @endif
                        @if(Auth::guard('admin')->user()->can('Achive.view'))
                      <a class="btn btn-warning" href="{{url('admin/achivement/view/'.Crypt::encrypt($item->id))}}">View<a>
                        @else
                              <p>Not Access</p>
                        @endif
                        @if(Auth::guard('admin')->user()->can('Achive.delete'))
                        <form action="{{url('admin/achivement/delete/'.Crypt::encrypt($item->id))}}" method="post">
                          @method('delete')   
                          @csrf
                          <button type="submit"  data-name="" class="btn btn-danger delete-confirm delete-confirm"> 
                            <i class="fas fa-trash-alt btn-icon-prepend"></i>
                             Delete
                          </button>   
                      </form>

                        @else
                          <p>Not Access</p>
                        @endif
                    </div>
                  </td>
              </tr>
           
              @endforeach
            </tbody>
          </table>
    </div>
  </main>
@endsection