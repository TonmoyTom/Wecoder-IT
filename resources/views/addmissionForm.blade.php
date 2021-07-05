@extends('layouts.app')
@section('title', 'Wecoder-It')

@section('content')

	<!-- Start Banner Nav -->
		<!-- Start Back top   -->
				<a href="#" class="back2 arrow" style= "display: block;">
				 <i class="fas fa-angle-double-up"></i>
				</a>
	    <!-- Start Back top   -->

         <!-- ========= breadcrumb Part End Here ========== -->
<section id="breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bread text-center">
                    <h1> Admission</h1>
                    <p>
                        <a href="">Home</a>
                       <i class="fas fa-angle-double-right"></i>
                        <a href="#"><span>Admission Form</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========= breadcrumb Part End Here ========== -->


        <section id="scholership">
            <div class="container">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{route('Adform.allstore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="row">
                        <div class="col-lg-12">
                            <div class="row form">
                                <div class="col-lg-12 form-head">
                                    <h3>PERSONAL  INFORMATION</h3>
                                </div>
                                <div class="col-lg-12 col-sm-12">
                                    <small class="text-danger">{{ $errors->first('student_name') }}</small>
                                    <input type="text" name="student_name" value="" placeholder="Student Name*" class="form-control ">
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('father_name') }}</small>
                                    <input type="text" name="father_name" value="" placeholder="Father’s Name*" class="form-control ">
                                    

                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('mother_name') }}</small>
                                    <input type="text" name="mother_name" value="" placeholder="Mother’s Name*" class="form-control ">
                                   
                                </div>

                                


                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                       
                                        <select class="form-control" name="category_id" id="category_id"  style="margin-bottom: 20px; color:#000!important;">
                                                <option>Category Select</option>
                                                @foreach ($category as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                           
                                          </select>
                                    </div>
                                    

                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        
                                        <select class="form-control" name="subcategory_id" id="subcategory_id"  style="margin-bottom: 20px; color:#000!important;">
                                            <option>SubCategory Select</option>
                                        </select>
                                    </div>
                                   
                                </div>
                                  
                                <div class="col-lg-12 col-sm-12">
                                    <small class="text-danger">{{ $errors->first('present_address') }}</small>
                                    <input type="text" name="present_address" value="" placeholder="Present Address*" class="form-control ">
                                   
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" name="permant_address" value="" placeholder="Permanent Address*" class="form-control ">
                                    
                                </div>
    
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('ssc') }}</small>
                                    <input type="text" name="ssc" value="" placeholder="S.S.C / O Level* School/College/University" class="form-control ">
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('sscyear') }}</small>
                                    <input type="number" name="sscyear" value="" placeholder="Year of Passing*" class="form-control ">
                                   
                                </div>
                                 <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="hsc" value="" placeholder="H.S.C / Diploma School/College/University*" class="form-control ">
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="number" name="hscyear" value="" placeholder="Year of Passing*" class="form-control ">
                                   
                                </div>
    
                                <div class="col-lg-6">
                                    <input type="text" name="office_address" value="" placeholder="Office Address (If Applicable)" class="form-control ">
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="number" name="nationalid" value="" placeholder="National ID*" class="form-control ">
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('occpation') }}</small>
                                    <input type="text" name="occpation"  value=""placeholder="Occupation*" class="form-control ">
                                  
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('year') }}</small>
                                    <input type="date" name="year"  value=""placeholder="Date of Birth*" class="form-control ">
                                    
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('country') }}</small>
                                    <select class="form-control " name="country">
                                        <option value="nationality">Nationality*</option>
                                        <option value="bangladeshi">Bangladeshi</option>
                                        <option value="othercountry">Other Country</option>
                                    </select>
                                   
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                                        <div class="col-lg-7 col-sm-8 ru-main text-left">
                                            <span class="ru">Gender*</span>
                                            <label class="customcheck">Male
                                                <input type="radio" name="gender" value='male'>
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="customcheck">Female
                                                <input type="radio" name="gender" value='female'>
                                                <span class="checkmark"></span>
                                            </label>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                    <input type="number" name="phone" value="" placeholder="Phone*" class="form-control ">
                                  
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                    <input type="email" name="email" value="" placeholder="Email*" class="form-control ">
                                   
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="number" name="gradiuannmber" value="" placeholder="Guardian’s Phone*" class="form-control ">
                                  
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="guradianrltn" value="" placeholder="Relationship with the Guardian*" class="form-control ">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row form">
                                <div class="col-lg-12 form-head">
                                    <h3>Reference Details</h3>
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="refname" value="" placeholder="Name*" class="form-control ">
                                  
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="number" name="refphone" value="" placeholder="Mobile Number*" class="form-control ">
                                   
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="batch" value="" placeholder="Batch*" class="form-control ">
                                   
                                </div>
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="retnstudent" value="" placeholder="Relation with Student" class="form-control ">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="submit">
                                <button type="submit" name="submit" class="btn form-control">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    <!-- ========= Admission form Part End Here ========== -->


	   <!-- ========= Footer Part Start Here ========== -->
	   <footer id="footer">
	   	<div class="container">
	   		<div class="row">
	   			<div class="col-lg-5 col-md-12 col-sm-12">
	   				<div class="fotterlogos">
	   					<img src="{{asset('frontend/images/logo.png')}}" alt="" class="footerlogo">
	   				</div>
	   				<div class="text">
	   					Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.
	   				</div>
	   			</div>
	   			<div class="col-lg-2 col-md-4 col-sm-6 col-6">
	   				<div class="help">
	   					<h5>Helpful Links</h5>
		   				<ul class="footer-nav">
							<li><a href="#"><i class="fa fa-angle-right"></i><span>About Us</span></a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i><span>Features</span></a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i><span>FAQ’s</span></a></li>
							<li><a href="#"><i class="fa fa-angle-right"></i><span>Blog</span></a></li>
						</ul>
	   				</div>
	   			</div>
	   			<div class="col-lg-2 col-md-4 col-sm-6 col-6">
					<div class="support">
						<h5>Support</h5>
					<ul class="footer-nav">
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Privacy Policy</span></a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Terms of Use</span></a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Support Center</span></a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i><span>Contact</span></a></li>
					</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-12">
					<div class="contact">
						<h5>Contact Us</h5>
					<div class="address">
						<p>AC Mosque in front G-block,PC<br>Road,Halishahar H/E,Chittagong</p>
						<p>Phone: +0881610989228</p>
						<p><span>E-Mail:</span><a href="#">wecoderit@gmail.com</a></p>
						<div class="center">
							<ul class="social">
							<li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
							<li><a href="#"><i class="fa fa-github-square"></i></a></li>
						</ul>
						</div>
					</div>
					</div>
				</div>
	   		</div>
	   		<div class="row">
				<div class="col-lg-12">
					<p class="copyright">© 2021 Turing. All Rights Reserved.</p>
				</div>
			</div>
	   	</div>
	   </footer>
	   <!-- ========= Footer Part End Here ========== -->
@endsection
