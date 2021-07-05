<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha256-L/W5Wfqfa0sdBNIKN9cG6QA5F2qx4qICmU2VgLruv9Y="
      crossorigin="anonymous"
    />
    

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
      integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY="
      crossorigin="anonymous"
    />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../../images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
 
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('backend/css/jquery.datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('backend/css/venobox.min.css') }}"  media="screen">
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}" />
    <style>
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

  </head>

  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-mattBlackLight fixed-top"
    >
      <button class="navbar-toggler sideMenuToggler" type="button">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand link"  href="#">{{ Auth::guard('admin')->user()->name }}</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle p-0"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="material-icons icon">
                person
              </i>
              <span class="text">Account</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('admin.logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
               {{-- <a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a> --}}
               <a class="dropdown-item" href="{{ route('admin.profile.change') }}">Profile Change</a>

              <form id="logout-form" action="{{  route('admin.logout')}}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
          </li>
        </ul>
      </div>
    </nav>
  
    <div class="wrapper d-flex">
      <div class="sideMenu bg-mattBlackLight">
        <div class="sidebar" style="background-color:#000">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="{{route('admin.dashboard')}}" class="nav-link px-2 ">
                <i class="material-icons icon">
                  dashboard
                </i>
                <span class="text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">User Profile</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('admin.profile')}}">Profile</a>
                <a class="dropdown-item" href="{{route('admin.profile.change')}}">Profile Change</a>
              </div>
            </li>
            @if (Auth::guard('admin')->user()->can('role.create') || Auth::guard('admin')->user()->can('role.all')
             || Auth::guard('admin')->user()->can('role.edit'))
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle px-2 "
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Role</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown"
              >
              @if(Auth::guard('admin')->user()->can('role.create'))
                <a class="dropdown-item" href="{{route('role.create')}}">Create</a>
                @endif
              @if(Auth::guard('admin')->user()->can('role.all'))
                <a class="dropdown-item" href="{{route('role.all')}}">Role</a>
                @endif
              </div>
            </li>
            @endif

            @if (Auth::guard('admin')->user()->can('admins.create') || Auth::guard('admin')->user()->can('admins.all') 
            || Auth::guard('admin')->user()->can('admins.edit') )
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle px-2 "
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">User</span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown"
              >
              @if(Auth::guard('admin')->user()->can('admins.create'))
                <a class="dropdown-item" href="{{route('admins.create')}}">Create</a>
                @endif
               @if(Auth::guard('admin')->user()->can('admins.all'))
                <a class="dropdown-item" href="{{route('admins.all')}}">User</a>
                @endif
              </div>
            </li>
            @endif


            @php



               $allAccessCount =  DB::select( "SELECT 
               (SELECT COUNT(*) FROM abouts WHERE status = 1 AND approve = 0) as about, 
               (SELECT COUNT(*) FROM achives WHERE status = 1 AND approve = 0) as achive, 
               (SELECT COUNT(*) FROM banners WHERE status = 1 AND approve = 0) as banner,
               (SELECT COUNT(*) FROM categories WHERE status = 1 AND approve = 0) as categorie,
               (SELECT COUNT(*) FROM subcategories WHERE status = 1 AND approve = 0) as subcategorie,
               (SELECT COUNT(*) FROM posts WHERE status = 1 AND approve = 0) as post,
               (SELECT COUNT(*) FROM facilites WHERE status = 1 AND approve = 0) as facilite,
               (SELECT COUNT(*) FROM faqs WHERE status = 1 AND approve = 0) as faq,
               (SELECT COUNT(*) FROM faqparents WHERE status = 1 AND approve = 0) as faqparent,
               (SELECT COUNT(*) FROM leaders WHERE status = 1 AND approve = 0) as leader,
               (SELECT COUNT(*) FROM seminars WHERE  approve = 0) as seminar,
               (SELECT COUNT(*) FROM jobplacements WHERE status = 1 AND approve = 0) as jobplacement,
               (SELECT COUNT(*) FROM contactmsgs WHERE status = 1 AND approve = 0) as contactmsg,
               (SELECT COUNT(*) FROM supports WHERE status = 1 AND approve = 0) as support,
               (SELECT COUNT(*) FROM addmissionproducers WHERE status = 1 AND approve = 0) as addmissionproducer,
               (SELECT COUNT(*) FROM reviews WHERE status = 1 AND approve = 0) as review");





               $allAccessCount = collect($allAccessCount)->first();
                // print_r($allAccessCount->categorie);
             
            //admin Access
                $aboutCount = $allAccessCount->about;
                $achiveCount = $allAccessCount->achive;
                $bannerCount =$allAccessCount->banner;
                $categoryCount = $allAccessCount->categorie;
                $subcategoryCount = $allAccessCount->subcategorie;
                $postCount = $allAccessCount->post;
                $facilitiesCount = $allAccessCount->facilite;
                $faqdetaliesCount = $allAccessCount->faq;
                $faqparentCount = $allAccessCount->faqparent;
                $leaderCount = $allAccessCount->leader;
                $seminerCount =$allAccessCount->seminar;
                $jobsCount = $allAccessCount->jobplacement;
                $contactCount =$allAccessCount->contactmsg ;
                $supportCount = $allAccessCount->support;
                $addmissionproduceCount = $allAccessCount->addmissionproducer;
                $reviewsCount = $allAccessCount->review;

            // User Access 


            $allUserAccessCount =  DB::select( "SELECT 
               (SELECT COUNT(*) FROM abouts WHERE status = 1 AND approve = 1  AND count = 0) as about, 
               (SELECT COUNT(*) FROM achives WHERE status = 1 AND approve = 1 AND count = 0) as achive, 
               (SELECT COUNT(*) FROM banners WHERE status = 1 AND approve = 1 AND count = 0) as banner,
               (SELECT COUNT(*) FROM categories WHERE status = 1 AND approve = 1 AND count = 0) as categorie,
               (SELECT COUNT(*) FROM subcategories WHERE status = 1 AND approve = 1 AND count = 0) as subcategorie,
               (SELECT COUNT(*) FROM posts WHERE status = 1 AND approve = 1 AND count = 0) as post,
               (SELECT COUNT(*) FROM facilites WHERE status = 1 AND approve = 1 AND count = 0) as facilite,
               (SELECT COUNT(*) FROM faqs WHERE status = 1 AND approve = 1 AND count = 0) as faq,
               (SELECT COUNT(*) FROM faqparents WHERE status = 1 AND approve = 1 AND count = 0) as faqparent,
               (SELECT COUNT(*) FROM leaders WHERE status = 1 AND approve = 1 AND count = 0) as leader,
               (SELECT COUNT(*) FROM seminars WHERE  approve = 1 AND count = 0) as seminar,
               (SELECT COUNT(*) FROM jobplacements WHERE status = 1 AND approve = 1 AND count = 0) as jobplacement,
               (SELECT COUNT(*) FROM contactmsgs WHERE status = 1 AND approve = 1 AND count = 0) as contactmsg,
               (SELECT COUNT(*) FROM supports WHERE status = 1 AND approve = 1) as support,
               (SELECT COUNT(*) FROM addmissionproducers WHERE status = 1 AND approve = 1 AND count = 0) as addmissionproducer,
               (SELECT COUNT(*) FROM reviews WHERE status = 1 AND approve = 1 AND count = 0) as review,
               (SELECT COUNT(*) FROM adforms WHERE status = 0 AND count = 1) as adform,
               (SELECT COUNT(*) FROM counsells WHERE mailsent = 0  AND count = 1 ) as counsell,
               (SELECT COUNT(*) FROM contacts WHERE status = 0  AND count = 0) as contact");


               $allUserAccessCount = collect($allUserAccessCount)->first();


                $aboutUserCount =$allUserAccessCount->about;
                $achiveUserCount = $allUserAccessCount->achive;
                $bannerUserCount = $allUserAccessCount->banner;
                $categoryUserCount = $allUserAccessCount->categorie;
                $subcategoryUserCount = $allUserAccessCount->subcategorie;
                $postUserCount = $allUserAccessCount->post;
                $facilitiesUserCount = $allUserAccessCount->facilite;
                $faqdetaliesUserCount = $allUserAccessCount->faq;
                $faqparentUserCount = $allUserAccessCount->faqparent;
                $leaderUserCount = $allUserAccessCount->leader;
                $seminerUserCount = $allUserAccessCount->seminar;
                $jobsUserCount = $allUserAccessCount->jobplacement;
                $contactUserCount =  $allUserAccessCount->contactmsg ;
                $supportUserCount = $allUserAccessCount->support;
                $producertUserCount =$allUserAccessCount->addmissionproducer;
                $reviewUserCount =  $allUserAccessCount->review;

                $admissionUserCount =  $allUserAccessCount->adform;
                $counsellUserCount = $allUserAccessCount->counsell;
                $contactallUserCount = $allUserAccessCount->contact;





                
            @endphp


            @if (Auth::guard('admin')->user()->can('about.access') || Auth::guard('admin')->user()->can('achive.access') 
            || Auth::guard('admin')->user()->can('banners.access') || Auth::guard('admin')->user()->can('category.access') 
            || Auth::guard('admin')->user()->can('producer.access') || Auth::guard('admin')->user()->can('subcategory.access') || Auth::guard('admin')->user()->can('post.access') || Auth::guard('admin')->user()->can('facilities.access') || Auth::guard('admin')->user()->can('faqdetalies.access') || Auth::guard('admin')->user()->can('faqparent.access') || Auth::guard('admin')->user()->can('leader.access') || Auth::guard('admin')->user()->can('seminer.access') || Auth::guard('admin')->user()->can('reviews.access') || Auth::guard('admin')->user()->can('contact.access') || Auth::guard('admin')->user()->can('support.access') || Auth::guard('admin')->user()->can('logos.access'))


            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2  {{ (request()->is('admin/approveabout') || request()->is('admin/approveachive') || request()->is('admin/approvebanners') || request()->is('admin/approvecategory') || request()->is('admin/approvesubcategory') || request()->is('admin/approvepost') || request()->is('admin/approvefacilities') || request()->is('admin/approvefaqparent') || request()->is('admin/approvefaqdetalies') || request()->is('admin/approveleader') || request()->is('admin/approveseminer') || request()->is('admin/approvejob') || request()->is('admin/approvecontact') || request()->is('admin/approvesupport') || request()->is('admin/approveproducer') || request()->is('admin/approvereviews') || request()->is('admin/approvelogos')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>

                 @php
                    $allapprovescounts = $aboutCount + $achiveCount + $bannerCount + $categoryCount  + $addmissionproduceCount + $subcategoryCount + $postCount + $facilitiesCount + $faqdetaliesCount + $faqparentCount + $leaderCount + $seminerCount + $jobsCount + $reviewsCount + $contactCount + $supportCount;
            
                @endphp
                <span class="text">All Access <span class="{{ $allapprovescounts == 0 ? '' : 'badge badge-secondary' }}">{{$allapprovescounts == 0 ? '' : $allapprovescounts}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if (Auth::guard('admin')->user()->can('about.access'))
                <a class="dropdown-item" href="{{route('about.access')}}">About Access <span  class="  {{ $aboutCount == 0 ? '' : 'badge badge-secondary' }}">
                  {{ $aboutCount == 0 ? '' : $aboutCount }}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('achive.access'))
                <a class="dropdown-item" href="{{route('achive.access')}}">Achive Access  <span class="{{ $achiveCount == 0 ? '' : 'badge badge-secondary' }}">{{$achiveCount == 0 ? '' : $achiveCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('banners.access'))
                <a class="dropdown-item" href="{{route('banners.access')}}">Banner Access <span class="{{ $bannerCount == 0 ? '' : 'badge badge-secondary' }}">{{$bannerCount == 0 ? '' : $bannerCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('category.access'))
                <a class="dropdown-item" href="{{route('category.access')}}">Category Access <span class="{{ $categoryCount == 0 ? '' : 'badge badge-secondary' }}">{{ $categoryCount == 0 ? '' : $categoryCount }}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('producer.access'))
                <a class="dropdown-item" href="{{route('producer.access')}}">AdmissionProducer Access <span class="{{ $addmissionproduceCount == 0 ? '' : 'badge badge-secondary' }}">{{ $addmissionproduceCount == 0 ? '' : $addmissionproduceCount }}</span></a>
                @endif

                @if (Auth::guard('admin')->user()->can('subcategory.access'))
                <a class="dropdown-item" href="{{route('subcategory.access')}}">SubCategory Access <span class="{{ $subcategoryCount == 0 ? '' : 'badge badge-secondary' }}">{{$subcategoryCount == 0 ? '' : $subcategoryCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('post.access'))
                <a class="dropdown-item" href="{{route('post.access')}}">Post Access <span class="{{ $postCount == 0 ? '' : 'badge badge-secondary' }}">{{$postCount == 0 ? '' : $postCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('facilities.access'))
                <a class="dropdown-item" href="{{route('facilities.access')}}">Facilities Access <span class="{{ $facilitiesCount == 0 ? '' : 'badge badge-secondary' }}">{{$facilitiesCount == 0 ? '' : $facilitiesCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('faqdetalies.access'))
                <a class="dropdown-item" href="{{route('faqdetalies.access')}}">FaqDetalis Access <span class="{{ $faqdetaliesCount == 0 ? '' : 'badge badge-secondary' }}">{{$faqdetaliesCount == 0 ? '' : $faqdetaliesCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('faqparent.access'))
                <a class="dropdown-item" href="{{route('faqparent.access')}}">FaqParents Access <span class="{{ $faqparentCount == 0 ? '' : 'badge badge-secondary' }}">{{$faqparentCount == 0 ? '' : $faqparentCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('leader.access'))
                <a class="dropdown-item" href="{{route('leader.access')}}">Leader Access <span class="{{ $leaderCount == 0 ? '' : 'badge badge-secondary' }}">{{$leaderCount  == 0 ? '' : $leaderCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('seminer.access'))
                <a class="dropdown-item" href="{{route('seminer.access')}}">Seminer Access <span class="{{ $seminerCount == 0 ? '' : 'badge badge-secondary' }}">{{$seminerCount  == 0 ? '' : $seminerCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('jobs.access'))
                <a class="dropdown-item" href="{{route('jobs.access')}}">Job Placement Access <span class="{{ $jobsCount == 0 ? '' : 'badge badge-secondary' }}">{{$jobsCount == 0 ? '' : $jobsCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('reviews.access'))
                <a class="dropdown-item" href="{{route('reviews.access')}}">Review Access <span class="{{ $reviewsCount == 0 ? '' : 'badge badge-secondary' }}">{{$reviewsCount == 0 ? '' : $reviewsCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('contact.access'))
                <a class="dropdown-item" href="{{route('contact.access')}}">Contact Address Access <span class="{{ $contactCount == 0 ? '' : 'badge badge-secondary' }}">{{$contactCount == 0 ? '' : $contactCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('support.access'))
                <a class="dropdown-item" href="{{route('support.access')}}">Support  Access <span class="{{ $supportCount == 0 ? '' : 'badge badge-secondary' }}">{{$supportCount == 0 ? '' : $supportCount}}</span></a>
                @endif
                @if (Auth::guard('admin')->user()->can('logos.access'))
                <a class="dropdown-item" href="{{route('logos.access')}}">Logo  Access </a>
                @endif
              </div>
            </li>
            @endif

            @if (Auth::guard('admin')->user()->can('Achive.create') || Auth::guard('admin')->user()->can('Achive.all') )
             <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allachivement') || request()->is('admin/create/achivement')) ? 'active' : '' }} "
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Achives<span class="{{ $achiveUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$achiveUserCount == 0 ? '' : $achiveUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">

                @if(Auth::guard('admin')->user()->can('Achive.all'))
                <a class="dropdown-item" href="{{route('Achive.all')}}">Achive <span class="{{ $achiveUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$achiveUserCount == 0 ? '' : $achiveUserCount}}</span></a>
                @endif
                @if(Auth::guard('admin')->user()->can('Achive.create'))
                <a class="dropdown-item" href="{{route('Achive.create')}}">Create</a>
                @endif
              </div>
            </li>
            @endif

            @if (Auth::guard('admin')->user()->can('banners.create') || Auth::guard('admin')->user()->can('banners.all'))
            <li class="nav-item dropdown active">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allbanners') || request()->is('admin/create/banners')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Banner<span class="{{ $bannerUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$bannerUserCount == 0 ? '' : $bannerUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('banners.all'))
                <a class="dropdown-item" href="{{route('banners.all')}}">Banner <span class="{{ $bannerUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$bannerUserCount == 0 ? '' : $bannerUserCount}}</span></a>
                @endif
                @if(Auth::guard('admin')->user()->can('banners.create'))
                <a class="dropdown-item" href="{{route('banners.create')}}">Create</a>
                @endif
              </div>

            </li>
            @endif
            
            @if (Auth::guard('admin')->user()->can('categories.all') || Auth::guard('admin')->user()->can('subcategories.all')|| Auth::guard('admin')->user()->can('posts.all') || Auth::guard('admin')->user()->can('posts.create'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allcategories') || request()->is('admin/allsubcategories') || request()->is('admin/allposts') || request()->is('admin/create/posts')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>

                @php
                    $allpostcounts = $categoryUserCount + $subcategoryUserCount + $postUserCount
                @endphp
                <span class="text">Course <span class="{{ $allpostcounts == 0 ? '' : 'badge badge-secondary' }}">{{$allpostcounts == 0 ? '' : $allpostcounts}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">

                @if(Auth::guard('admin')->user()->can('categories.all'))
                <a class="dropdown-item" href="{{route('categories.all')}}">Category <span class="{{ $categoryUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$categoryUserCount == 0 ? '' : $categoryUserCount}}</span></a>
                @endif
                @if(Auth::guard('admin')->user()->can('subcategories.all'))
                <a class="dropdown-item" href="{{route('subcategories.all')}}">SubCategory <span class="{{ $subcategoryUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$subcategoryUserCount == 0 ? '' : $subcategoryUserCount}}</span></a>
                @endif
                @if(Auth::guard('admin')->user()->can('posts.all'))
                <a class="dropdown-item" href="{{route('posts.all')}}">Post All <span class="{{ $postUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$postUserCount == 0 ? '' : $postUserCount}}</span></a>
                @endif
                @if(Auth::guard('admin')->user()->can('posts.create'))
                <a class="dropdown-item" href="{{route('posts.create')}}">Create post</a>
                @endif
              </div>
            </li>
            @endif
            @if (Auth::guard('admin')->user()->can('counsell.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allCounsell')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Counselling <span class="{{ $counsellUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$counsellUserCount == 0 ? '' : $counsellUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('counsell.all'))
                <a class="dropdown-item" href="{{route('counsell.all')}}">Counselling <span class="{{ $counsellUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$counsellUserCount == 0 ? '' : $counsellUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if (Auth::guard('admin')->user()->can('facilities.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allfacilities')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Facilities <span class="{{ $facilitiesUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$facilitiesUserCount == 0 ? '' : $facilitiesUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('facilities.all'))
                <a class="dropdown-item" href="{{route('facilities.all')}}">Facilities <span class="{{ $facilitiesUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$facilitiesUserCount == 0 ? '' : $facilitiesUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('leaders.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allleaders')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Leader <span class="{{ $leaderUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$leaderUserCount == 0 ? '' : $leaderUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('leaders.all'))
                <a class="dropdown-item" href="{{route('leaders.all')}}">Leader <span class="{{ $leaderUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$leaderUserCount == 0 ? '' : $leaderUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->can('abouts.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allabouts')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">About <span class="{{ $aboutUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$aboutUserCount == 0 ? '' : $aboutUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('abouts.all'))
                <a class="dropdown-item" href="{{route('abouts.all')}}">About <span class="{{ $aboutUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$aboutUserCount == 0 ? '' : $aboutUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->can('addmissionproducers.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/alladdmissionproducers')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Addmission Producer <span class="{{ $producertUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$producertUserCount == 0 ? '' : $producertUserCount}}</span> </span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('addmissionproducers.all'))
                <a class="dropdown-item" href="{{route('addmissionproducers.all')}}">Addmission Producer <span class="{{ $producertUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$producertUserCount == 0 ? '' : $producertUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('addmission.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/alladdmission')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Addmission From  <span class="{{ $admissionUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$admissionUserCount == 0 ? '' : $admissionUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('addmission.all'))
                <a class="dropdown-item" href="{{route('addmission.all')}}">Addmission From <span class="{{ $admissionUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$admissionUserCount == 0 ? '' : $admissionUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('jobplacement.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/alljobplacement')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">JobPlacement  <span class="{{ $jobsUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$jobsUserCount == 0 ? '' : $jobsUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('jobplacement.all'))
                <a class="dropdown-item" href="{{route('jobplacement.all')}}">JobPlacement <span class="{{ $jobsUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$jobsUserCount == 0 ? '' : $jobsUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('faqparents.all') || Auth::guard('admin')->user()->can('faqs.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allfaqparents') || request()->is('admin/allfaqs')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>

                @php
                    $allfaqscounts = $faqparentUserCount + $faqdetaliesUserCount
                @endphp
                <span class="text">Faq  <span class="{{ $allfaqscounts == 0 ? '' : 'badge badge-secondary' }}">{{$allfaqscounts == 0 ? '' : $allfaqscounts}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('faqparents.all'))
                <a class="dropdown-item" href="{{route('faqparents.all')}}">Faq Title <span class="{{ $faqparentUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$faqparentUserCount == 0 ? '' : $faqparentUserCount}}</span></a>
                @endif
                @if(Auth::guard('admin')->user()->can('faqs.all'))
                <a class="dropdown-item" href="{{route('faqs.all')}}">Faq Detalis <span class="{{ $faqdetaliesUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$faqdetaliesUserCount == 0 ? '' : $faqdetaliesUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif

            @if(Auth::guard('admin')->user()->can('seminars.all'))
             <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allseminars')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Seminar <span class="{{ $seminerUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$seminerUserCount == 0 ? '' : $seminerUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('seminars.all'))
                <a class="dropdown-item" href="{{route('seminars.all')}}">Seminar <span class="{{ $seminerUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$seminerUserCount == 0 ? '' : $seminerUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('contact.all') || Auth::guard('admin')->user()->can('contactdetalis.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2  {{ (request()->is('admin/allcontact') || request()->is('admin/allcontactdetalis')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>

                @php
                    $countactcounts = $contactUserCount + $contactallUserCount
                @endphp
                <span class="text">Contact <span class="{{ $countactcounts == 0 ? '' : 'badge badge-secondary' }}">{{$countactcounts == 0 ? '' : $countactcounts}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('contact.all'))
                <a class="dropdown-item" href="{{route('contact.all')}}">Conatct <span class="{{ $contactallUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$contactallUserCount == 0 ? '' : $contactallUserCount}}</span></a>
                @endif
                @if(Auth::guard('admin')->user()->can('contactdetalis.all'))
                <a class="dropdown-item" href="{{route('contactdetalis.all')}}">Conatct Text <span class="{{ $contactUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$contactUserCount == 0 ? '' : $contactUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('support.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allsupport')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Support <span class="{{ $supportUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$supportUserCount == 0 ? '' : $supportUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('support.all'))
                <a class="dropdown-item" href="{{route('support.all')}}">Support <span class="{{ $supportUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$supportUserCount == 0 ? '' : $supportUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('reviews.all'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/allreviews')) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Review <span class="{{ $reviewUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$reviewUserCount == 0 ? '' : $reviewUserCount}}</span></span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('reviews.all'))
                <a class="dropdown-item" href="{{route('reviews.all')}}">Review <span class="{{ $reviewUserCount == 0 ? '' : 'badge badge-secondary' }}">{{$reviewUserCount == 0 ? '' : $reviewUserCount}}</span></a>
                @endif
              </div>
            </li>
            @endif
            @if(Auth::guard('admin')->user()->can('logos.all') || Auth::guard('admin')->user()->can('logos.create'))
            <li class="nav-item dropdown">
              <a href=""  class="nav-link dropdown-toggle px-2 {{ (request()->is('admin/alllogos') || request()->is('admin/create/logos/') ) ? 'active' : '' }}"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
                <i class="material-icons icon">
                  person
                </i>
                <span class="text">Setting </span>
              </a>
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                @if(Auth::guard('admin')->user()->can('logos.all'))
                <a class="dropdown-item" href="{{route('logos.all')}}">Logo </a>
                @endif
                @if(Auth::guard('admin')->user()->can('logos.create'))
                <a class="dropdown-item" href="{{route('logos.create')}}">Create Logo </a>
                @endif
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>
      <div class="content">
      @yield('content')
      </div>
    </div>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    integrity="sha256-OUFW7hFO0/r5aEGTQOz9F/aXQOt+TwqI1Z4fbVvww04="
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"
    integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI="
    crossorigin="anonymous"   
  ></script>
    

  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <script src="{{ URL::asset('backend/js/dropify.min.js') }}"></script>
  <script src="{{ URL::asset('backend/js/jquery.datetimepicker.full.min.js') }}"></script>
  <script src="{{ URL::asset('backend/js/venobox.min.js') }}"></script>
  <
 
  <script src="{{asset('backend/js/script.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/vue@2.6.12/dist/vue.js"></script>
  <!-- End custom js for this page-->

  <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
  <script src="{{ asset('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js')}}"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script>
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
               toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
   </script>
  <script>  
    
  $('.delete-confirm').click(function(event) {
  var form =  $(this).closest("form");
  var name = $(this).data("name");
  event.preventDefault();
  swal({
    title: `Are you sure you want to delete ${name}?`,
    text: "If you delete this, it will be gone forever.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
  if (willDelete) {
    form.submit();
  }else {
      swal("Cancel");
    }
  });
  });
  </script>
  @yield('scripts')
</body>
</html>

