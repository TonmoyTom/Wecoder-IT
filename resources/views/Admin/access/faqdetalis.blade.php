@extends('layouts.admin-home')
@section('title', 'Wecoder-It| FaqDetails Approve')
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
                <li class="breadcrumb-item active" aria-current="page">FaqDetails Approve</li>
              </ol>
            </nav>
          </div>
          <table id="myTable" class="table">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Slug</th>
                  <th>Faq Category</th>
                  <th>Status</th>
                  <th>Admin-Approve</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $count=0; @endphp
              @foreach($faqapprove as $item)
              @php $count+=1 @endphp
              <tr>
                  <td>{{$count}}</td>
                  <td>{{$item->slug}}</td>
                  <td>{{$item->faqparent->faqtitle}}</td>
                  
                  <td>
                    @if($item->status == 1)
                    <a href="javascript:void(0)" class=" updatefaqstatus" id="faq-{{$item->id }}"
                       section_id ="{{$item->id}}" >Active</a>
                    @else
                    <a  href="javascript:void(0)" class=" updatefaqstatus" id="faq-{{$item->id }}"
                      section_id ="{{$item->id}}">Deactive</a>
                    @endif
                  </td>
                  <td style="text-align: center;">
                    @if($item->approve == 1)
                    <a href="javascript:void(0)" class=" updatefaqapprove" id="faqApprove-{{$item->id }}"
                        section_id ="{{$item->id}}" >Active</a>
                    @else
                    <a href="javascript:void(0)" class=" updatefaqapprove" id="faqApprove-{{$item->id }}"
                        section_id ="{{$item->id}}" >Deactive</a>
                    @endif
                  </td>
                  <td>
                  
                    <div class="btn-group">
                      @if(Auth::guard('admin')->user()->can('faqs.edit'))
                      <a class="btn btn-info editabout"  href="{{url('admin/faqs/edit/'.Crypt::encrypt($item->id))}}" >Edit<a>
                        @else
                          <a>Non-Approve</a>
                        @endif
                        @if(Auth::guard('admin')->user()->can('faqs.view'))
                      <a class="btn btn-warning "  href="{{url('admin/faqs/view/'.Crypt::encrypt($item->id))}}" >View<a>
                        @else
                          <a>Non-Approve</a>
                        @endif
                        @if(Auth::guard('admin')->user()->can('faqs.delete'))
                        <form action="{{url('admin/faqs/delete/'.Crypt::encrypt($item->id))}}" method="post">   
                          @csrf
                            <button type="submit"  data-name="{{$item->slug}}" class="btn btn-danger btn-icon-text right delete-confirm"> 
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