@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Banner ')
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
                <li class="breadcrumb-item active" aria-current="page">Banner</li>
              </ol>
            </nav>
          </div>
        <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th  >Image</th>
                <th  >slug</th>
                <th  >Active</th>
                <th  >Apdmin Approve</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
                @php $count=0; @endphp
                    @foreach($banners as $item)
                    @php $count+=1 @endphp
                  <tr>
                    <th scope="row">{{$count}}</th>
                    <td>{{$item->name}}</td>
                    <td><a class="venobox" data-gall="gallery01" title="{{$item->imagename}}" href="{{asset('Image/Banner/'.$item->imagename)}}">{{$item->imagename}}</a></td>
                    <td>{{$item->slug}}</td>
                    <td style="text-align: center;">
                      @if($item->status == 1)
                      <a style="" href="javascript:void(0)" class=" updateBannerstatus" id="banner-{{$item->id }}"
                         section_id ="{{$item->id}}" >Active</a>
                      @else
                      <a  href="javascript:void(0)" class=" updateBannerstatus" id="banner-{{$item->id }}"
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
                        @if(Auth::guard('admin')->user()->can('banners.edit'))
                        <a class="btn btn-info" href="{{url('admin/banners/edit/'.Crypt::encrypt($item->id))}}">Edit<a>
                          @else
                          <p>Not Access</p>
                          @endif
                          @if(Auth::guard('admin')->user()->can('banners.view'))
                        <a class="btn btn-warning" href="{{url('admin/banners/view/'.Crypt::encrypt($item->id))}}">View<a>
                          @else
                          <p>Not Access</p>
                          @endif
                          @if(Auth::guard('admin')->user()->can('banners.delete'))
                          <form action="{{url('admin/banners/delete/'.Crypt::encrypt($item->id))}}" method="post">
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