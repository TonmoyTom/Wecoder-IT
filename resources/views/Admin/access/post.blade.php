@extends('layouts.admin-home')
@section('title', 'Wecoder-It| Post Approve')
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
                <li class="breadcrumb-item active" aria-current="page">Post Approve</li>
              </ol>
            </nav>
          </div>
        <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th  >Slug</th>
                <th  >Category</th>
                <th  >SubCategory</th>
                <th  >Time</th>
                <th  >Active</th>
                <th  >Apdmin Approve</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
                @php $count=0; @endphp
                    @foreach($postapprove as $item)
                    @php $count+=1 @endphp
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->subcategory->name}}</td>
                    <td>{{$item->created_at->diffForHumans()}}</td>
                    <td style="text-align: center;">
                      @if($item->status == 1)
                      <a style="" href="javascript:void(0)" class=" updatepoststatus" id="posts-{{$item->id }}"
                         section_id ="{{$item->id}}" >Active</a>
                      @else
                      <a  href="javascript:void(0)" class=" updatepoststatus" id="posts-{{$item->id }}"
                        section_id ="{{$item->id}}">Deactive</a>
                      @endif
                    </td>
                    <td style="text-align: center;">
                        @if($item->approve == 1)
                        <a href="javascript:void(0)" class="updatepostapprove" id="postApprove-{{$item->id }}"
                            section_id ="{{$item->id}}" >Active</a>
                        @else
                        <a href="javascript:void(0)" class="updatepostapprove" id="postApprove-{{$item->id }}"
                            section_id ="{{$item->id}}" >Deactive</a>
                        @endif
                    </td>
                   
                   
                    <td>

                      <div class="btn-group">
                        @if(Auth::guard('admin')->user()->can('posts.edit'))
                        <a class="btn btn-info" href="{{url('admin/posts/edit/'.Crypt::encrypt($item->id))}}">Edit<a>
                          @else
                                <a>Non-Approve</a>
                            @endif
                            @if(Auth::guard('admin')->user()->can('posts.view'))
                             <a class="btn btn-warning" href="{{url('admin/posts/view/'.Crypt::encrypt($item->id))}}">View<a>
                              @else
                              <a>Non-Approve</a>
                          @endif
                          @if(Auth::guard('admin')->user()->can('posts.delete'))
                          <form action="{{url('admin/posts/delete/'.Crypt::encrypt($item->id))}}" method="post">
                               
                            @csrf
                            <button type="submit"  data-name="{{$item->slug}}" class="btn btn-danger delete-confirm delete-confirm"> 
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