@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Logo')
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
                <li class="breadcrumb-item active" aria-current="page">Logo</li>
              </ol>
            </nav>
          </div>
        <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th  >Image</th>
                <th  >slug</th>
                <th  >Active</th>
                <th  >Apdmin Approve</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
                @php $count=0; @endphp
                    
                    @php $count+=1 @endphp
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td><a class="venobox" data-gall="gallery01" title="{{$logos->imagename}}" href="{{asset('Image/Logo/'.$logos->imagename)}}">{{$logos->imagename}}</a></td>
                    <td>{{$logos->slug}}</td>
                    <td style="text-align: center;">
                      @if($logos->status == 1)
                      <a style="" href="javascript:void(0)" class=" updateLogostatus" id="logo-{{$logos->id }}"
                         section_id ="{{$logos->id}}" >Active</a>
                      @else
                      <a  href="javascript:void(0)" class=" updateLogostatus" id="logo-{{$logos->id }}"
                        section_id ="{{$logos->id}}">Deactive</a>
                      @endif
                    </td>
                    <td style="text-align: center;">
                      @if($logos->approve == 1)
                      <a >Approve</a>
                      @else
                      <a>Non-Approve</a>
                      @endif
                      </td>
                   
                   
                    <td>

                      <div class="btn-group">
                        @if(Auth::guard('admin')->user()->can('logos.edit'))
                        <a class="btn btn-info" href="{{url('admin/logos/edit/'.Crypt::encrypt($logos->id))}}">Edit<a>
                          @else
                                <a>Non-Approve</a>
                            @endif

                            @if(Auth::guard('admin')->user()->can('logos.delete'))
                          <form action="{{url('admin/logos/delete/'.Crypt::encrypt($logos->id))}}" method="post">
                            @method('delete')   
                            @csrf
                            <button type="submit"  data-name="" class="btn btn-danger delete-confirm delete-confirm"> 
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
             
             
            
            </tbody>
          </table>
    </div>
  </main>
@endsection