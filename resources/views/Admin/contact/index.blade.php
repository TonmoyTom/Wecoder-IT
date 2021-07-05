@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Contact index')
@section('content')
<main>
    <div class="container " style="margin-top: 40px;" >
        <div class="page-header">
            <h3 class="page-title">
              Contact
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Wecodeit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
              </ol>
            </nav>
          </div>
        <table id="myTable" class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th  >Email</th>
                <th  >Phone</th>
                <th  >Mail</th>
                <th >Action</th>
              </tr>
            </thead>

            <tbody>
                @php $count=0; @endphp
                    @foreach($contact as $item)
                    @php $count+=1 @endphp

                    <?php
                    if($item->status == 0){
                      $color = "700";
                    }else{
                      $color = "400";
                    }
                   
                    ?>
                  <tr style="font-weight:{{$color}};">
                    <th scope="row">{{$count}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td style="text-align: center;">
                        @if($item->status == 1)
                        <a >Sent</a>
                        @else
                        <a>Unsent</a>
                        @endif
                      </td>
                   
                    <td>

                      <div class="btn-group">

                        @if(Auth::guard('admin')->user()->can('contact.edit'))
                        <a class="btn btn-info "  href="{{url('admin/contact/edit/'.Crypt::encrypt($item->id))}}"  style="color: #fff;" >Mail Send<a>
                          @else
                          <p>Not Access</p>
                          @endif
                          @if(Auth::guard('admin')->user()->can('contact.view'))
                            <a class="btn btn-warning "  href="{{url('admin/contact/view/'.Crypt::encrypt($item->id))}}"  style="color: #fff;" >View<a>
                              @else
                              <p>Not Access</p>
                              @endif
                              @if(Auth::guard('admin')->user()->can('contact.delete'))
                          <form action="{{url('admin/contact/delete/'.Crypt::encrypt($item->id))}}" method="post">
  
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

    
        
              <!-- Modal -->
              
        
  </main>
@endsection