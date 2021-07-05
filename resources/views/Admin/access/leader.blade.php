@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Leader Approve')
@section('content')
<main>
    <div class="container " style="margin-top: 40px;" >
        <div class="page-header">
            <h3 class="page-title">
              Banner
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Wecodeit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Leader Approve</li>
              </ol>
            </nav>
          </div>
          <table id="myTable" class="table">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Images</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Admin-Approve</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $count=0; @endphp
              @foreach($leaderapprove as $item)
              @php $count+=1 @endphp
              <tr>
                  <td>{{$count}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->slug}}</td>
                  <td><a class="venobox" data-gall="gallery01" title="{{$item->imagename}}"
                     href="{{asset('Image/Leaders/'.$item->imagename)}}">{{$item->imagename}}</a></td>
                 
              
                  
                 
                  <td>{{$item->detalis}}</td>
                  
                  <td>
                    @if($item->status == 1)
                    <a href="javascript:void(0)" class=" updateLeadersstatus" id="leaders-{{$item->id }}"
                       section_id ="{{$item->id}}" >Active</a>
                    @else
                    <a  href="javascript:void(0)" class=" updateLeadersstatus" id="leaders-{{$item->id }}"
                      section_id ="{{$item->id}}">Deactive</a>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    @if($item->approve == 1)
                    <a href="javascript:void(0)" class=" updateleaderapprove" id="leaderApprove-{{$item->id }}"
                        section_id ="{{$item->id}}" >Active</a>
                    @else
                    <a href="javascript:void(0)" class=" updateleaderapprove" id="leaderApprove-{{$item->id }}"
                        section_id ="{{$item->id}}" >Deactive</a>
                    @endif
                  </td>
                  <td>
                  
                    <div class="btn-group">
                      @if(Auth::guard('admin')->user()->can('leaders.edit'))
                      <a class="btn btn-info "  href="{{url('admin/leaders/edit/'.Crypt::encrypt($item->id))}}" >Edit<a>
                        @else
                            <a>Non-Approve</a>
                        @endif
                        @if(Auth::guard('admin')->user()->can('leaders.view'))
                        <a class="btn btn-info "  href="{{url('admin/leaders/view/'.Crypt::encrypt($item->id))}}" >Edit<a>
                          @else
                              <a>Non-Approve</a>
                          @endif
                          @if(Auth::guard('admin')->user()->can('leaders.delete'))
                        <form action="{{url('admin/leaders/delete/'.Crypt::encrypt($item->id))}}" method="post">  
                          @csrf
                          <button type="submit"  data-name="{{$item->slug}}" class="btn btn-danger delete-confirm "> 
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
  </main>
@endsection