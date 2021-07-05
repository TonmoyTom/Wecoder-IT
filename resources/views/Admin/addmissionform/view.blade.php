@extends('layouts.admin-home')
@section('title', 'Wecoder-It || Addmission View ')
@section('content')
    <main>
        <div class="contanier">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card-body">
                        <h4 class="card-title" style="color: #000; margin-top:10px;"></h4>
                  
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
    
                                            <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row form">
                                                <div class="col-lg-12 form-head">
                                                    <h3 style="color: #000; margin-top:10px;">PERSONAL  INFORMATION View</h3>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 input">
                                                   
                                                    <input type="text" name="student_name" value="{{$addmission->father_name}}" placeholder="Student Name*" class="form-control " style="margin-bottom: 20px;">
                                                    
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                   
                                                    <input type="text" name="father_name" value="{{$addmission->father_name}}" placeholder="Father’s Name*" class="form-control "style="margin-bottom: 20px;">
                                                    
                
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('mother_name') }}</small>
                                                    <input type="text" name="mother_name" value="{{$addmission->mother_name}}" placeholder="Mother’s Name*" class="form-control "style="margin-bottom: 20px;">
                                                   
                                                </div>


                                                <div class="col-lg-6 col-sm-6">
                                                   
                                                       
                                                        <select class="form-control allcat" name="category_id" id="category_id" style="margin-bottom: 20px;">
                                                            <option>Select</option>
                                                            ion>Select</option>
                                                            @foreach ($category as $item)
                                                            <option value="{{$item->id}}"
                                                              <?php if($addmission->category_id == $item->id){
                                                                  echo "selected";
                                                              } ?>
                                                              >{{$item->name}}</option>
                                                            @endforeach
                                                       
                                                           
                                                          </select>
                
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                        <select class="form-control allcat" name="subcategory_id" id="subcategory_id" style="margin-bottom: 20px;">
                                                            <option>Select</option>
                                                            
                                                            @foreach ($subcategory as $item)
                                                            <option value="{{$item->id}}"
                                                              <?php if($addmission->subcategory_id == $item->id){
                                                                  echo "selected";
                                                              } ?>
                                                              >{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                   
                                                </div>
                                                <div class="col-lg-12 col-sm-12">
                                                    <small class="text-danger">{{ $errors->first('present_address') }}</small>
                                                    <input type="text" name="present_address" value="{{$addmission->present_address}}" placeholder="Present Address*" class="form-control "style="margin-bottom: 20px;">
                                                   
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="text" name="permant_address" value="{{$addmission->permant_address}}" placeholder="Permanent Ad dress*" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                    
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('ssc') }}</small>
                                                    <input type="text" name="ssc" value="{{$addmission->ssc}}" placeholder="S.S.C / O Level* School/College/University" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('sscyear') }}</small>
                                                    <input type="number" name="sscyear" value="{{$addmission->sscyear}}" placeholder="Year of Passing*" class="form-control "style="margin-bottom: 20px;">
                                                   
                                                </div>
                                                 <div class="col-lg-6 col-sm-6">
                                                    <input type="text" name="hsc" value="{{$addmission->hsc}}" placeholder="H.S.C / Diploma School/College/University*" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="number" name="hscyear" value="{{$addmission->hscyear}}" placeholder="Year of Passing*" class="form-control "style="margin-bottom: 20px;">
                                                   
                                                </div>
                    
                                                <div class="col-lg-6">
                                                    <input type="text" name="office_address" value="{{$addmission->office_address}}" placeholder="Office Address (If Applicable)" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="number" name="nationalid" value="{{$addmission->nationalid}}" placeholder="National ID*" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('occpation') }}</small>
                                                    <input type="text" name="occpation"  value="{{$addmission->occpation}}"placeholder="Occupation*" class="form-control "style="margin-bottom: 20px;">
                                                  
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('year') }}</small>
                                                    <input type="date" name="year"  value="{{$addmission->year}}"placeholder="Date of Birth*" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('country') }}</small>
                                                    <select class="form-control " name="country" style="margin-bottom: 20px;">
                                                        <option value="nationality" {{($addmission->country == 'nationality') ? 'Selected' : ''}} >Nationality*</option>
                                                        <option value="bangladeshi" {{($addmission->country == 'bangladeshi') ? 'Selected' : ''}}>Bangladeshi</option>
                                                        <option value="othercountry" {{($addmission->country == 'othercountry') ? 'Selected' : ''}}>Other Country</option>
                                                    </select>
                                                   
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                                                        <div class="col-lg-7 col-sm-8 ru-main text-left">
                                                            <span class="ru">Gender*</span>
                                                            <label class="customcheck">Male
                                                                <input type="radio"name="gender" value='male' 
                                                                {{($addmission->gender == 'male') ? 'checked' : ''}}>
                                                                <span class="checkmark"  ></span>
                                                            </label>
                                                            <label class="customcheck">Female
                                                                <input type="radio" name="gender" value='female' 
                                                                {{($addmission->gender == 'female') ? 'checked' : ''}}>
                                                                <span class="checkmark" ></span>
                                                            </label>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                                                    <input type="number" name="phone" value="{{$addmission->phone}}" placeholder="Phone*" class="form-control "style="margin-bottom: 20px;">
                                                  
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                                    <input type="email" name="email" value="{{$addmission->email}}" placeholder="Email*" class="form-control "style="margin-bottom: 20px;">
                                                   
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="number" name="gradiuannmber" value="{{$addmission->gradiuannmber}}" placeholder="Guardian’s Phone*" class="form-control "style="margin-bottom: 20px;">
                                                  
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="text" name="guradianrltn" value="{{$addmission->guradianrltn}}" placeholder="Relationship with the Guardian*" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row form">
                                                <div class="col-lg-12 form-head">
                                                    <h3  style="color: #000; margin-top:10px;">Reference Details</h3>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="text" name="refname" value="{{$addmission->refname}}" placeholder="Name*" class="form-control " style="margin-bottom: 20px;">
                                                  
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="number" name="refphone" value="{{$addmission->refphone}}" placeholder="Mobile Number*" class="form-control "style="margin-bottom: 20px;">
                                                   
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="text" name="batch" value="{{$addmission->batch}}" placeholder="Batch*" class="form-control "style="margin-bottom: 20px;">
                                                   
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <input type="text" name="retnstudent" value="{{$addmission->retnstudent}}" placeholder="Relation with Student" class="form-control "style="margin-bottom: 20px;">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                
                       
                      </div>
                </div>
            </div>
        </div>
    <main
@endsection