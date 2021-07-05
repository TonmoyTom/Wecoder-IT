<?php

namespace App\Http\Controllers;

use App\About;
use App\Addmissionproducer;
use App\Adform;
use App\Category;
use App\Contact;
use App\Counsell;
use App\Facilite;
use App\Faqparent;
use App\Jobplacement;
use App\Jobs\Addmission\DefaultAddmissionEmailJob;
use App\Jobs\Addmission\SendAddmissionUserEmailJob;
use App\Jobs\Contact\DefaultContactEmailJob;
use App\Jobs\Contact\SendContactUserEmailJob;
use App\Jobs\Counsell\DefaultEmailJob;
use App\Jobs\Counsell\SendUserEmailJob;
use App\Post;
use App\Seminar;
use App\Subcategory;
use App\Review;
use App\Support;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function about(){


    
        $about =   About::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->limit(1)->get();
        
    
    
        return view('frontend.about')->with(compact('about'));
    
       }


       public function producer(){


    
        $producer =   Addmissionproducer::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->limit(1)->get();
       
    
    
        return view('frontend.producer')->with(compact('producer'));
    
       }


       public function placement(){


    
        $placement =  Jobplacement::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->limit(1)->get();
        
    
    
        return view('frontend.placement')->with(compact('placement'));
    
       }


       public function facilites(){

        $facilites =   Facilite::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->limit(1)->get();
        return view('frontend.facilites')->with(compact('facilites'));
    
       }


       public function semeniar(){

        $semeniar =   Seminar::where(['approve' => 1])->orderBy('id', 'DESC')->get();
        return view('frontend.semeniar')->with(compact('semeniar'));
    
       }


       public function support(){

        $support =   Support::where(['status' => 1, 'approve' => 1 ])->orderBy('id', 'DESC')->get();
        return view('frontend.support')->with(compact('support'));
    
       }

       public function reviews(){

        $review =   Review::where(['status' => 1,'approve' => 1])->orderBy('id', 'DESC')->get();
        return view('frontend.reviews')->with(compact('review'));
    
       }


       public function courseDetalis($slug){

   

        $courseDetalis =   Post::where(['approve' => 1,'status' => 1, 'slug'=> $slug])->first();

        $id = $courseDetalis->category_id;

        
        $subid = $courseDetalis->subcategory_id ;


        $subCategory = Subcategory::with('post')->where(['approve' => 1,'status' => 1,'category_id' => $id,  ])->where('id' ,'!=', $subid  )->get();


        // dd($subCategory);
        // die();


        return view('frontend.courseDetalis')->with(compact('courseDetalis','subCategory'));;
    
       }


       public function faq(){

        $faqparent =   Faqparent::with('faq')->where(['approve' => 1,'status' => 1])->orderBy('id', 'ASC')->get();
        //$category =  Category::with('post')->where(['status' => 1, 'approve' => 1])->orderBy('id', 'ASC')->get();
        // dd($faqparent);
        // die();
        return view('frontend.faq')->with(compact('faqparent'));
    
       }


       public function allcourse(){

        $category =  Category::with('post')->where(['status' => 1, 'approve' => 1])->orderBy('id', 'ASC')->get();
       
        return view('frontend.allCourse')->with(compact('category'));
    
       }


       public function index()
    {   
        $category = Category::where(['status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();
       
        
        return view('addmissionForm',compact('category'));
    }


    public function subcat($category_id)
    {

        
        $subcategories = Subcategory::where(['category_id'=> $category_id,'status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();
            // return response()->json([
            // 'subcategories' => $subcategories
            // ]);
            return json_encode($subcategories);
            // dd($subcategories);
    
    }

    public function store(Request $request)
    {
        $rules = [
            'student_name' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'present_address' => 'required',
            'ssc' => 'required',
            'sscyear' => 'required',
            'occpation' => 'required',
            'year' => 'date',
            'country' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
        ];
    
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);


       
            $addmission = new Adform();
            $addmission->student_name = $request->student_name;
            $addmission->mother_name = $request->mother_name;
            $addmission->father_name = $request->father_name;
            $addmission->category_id = $request->category_id;
            $addmission->subcategory_id = $request->subcategory_id;
            $addmission->present_address = $request->present_address;
            $addmission->permant_address = $request->permant_address;
            $addmission->ssc = $request->ssc;
            $addmission->sscyear = $request->sscyear;
            $addmission->hsc = $request->hsc;
            $addmission->hscyear = $request->hscyear;
            $addmission->office_address = $request->office_address;
            $addmission->gender = $request->gender;
            $addmission->nationalid = $request->nationalid;
            $addmission->occpation = $request->occpation;
            $addmission->year = $request->year;
            $addmission->country = $request->country;
            $addmission->phone = $request->phone;
            $addmission->email = $request->email;
            $addmission->gradiuannmber = $request->gradiuannmber;
            $addmission->guradianrltn = $request->guradianrltn;
            $addmission->refname = $request->refname;
            $addmission->refphone = $request->refphone;
            $addmission->batch = $request->batch;
            $addmission->retnstudent = $request->retnstudent;
            $addmission->count = 1 ;



            if(!empty($addmission->save())){
                $addmission->save();
                

                //Mail::to('kamrulzamantonmoy@gmail.com')->send(new addmissionmail($data));

                //Mail::to($request->email)->send(new defualtmail());


                $data       =   array(
                    "name"    =>   $request->name,
                    "email"    =>   $request->email,
                );

                dispatch(new DefaultAddmissionEmailJob($data));
                dispatch(new SendAddmissionUserEmailJob($data));


                
                
            }else{
                return back()->with("error", "Your Information not sent.");
            }
          

            return Redirect()->route('index')->with("status", "Your message has been received, We'll get back to you shortly.");
      

    }

    public function contactindex()
    {
        return view('contact');
    }


    public function contactstore(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            
        ];
    
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);


       
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->count = 1;
        


            if(!empty($contact->save())){
                $contact->save();
                // $data       =   array(
                //     "name"    =>   $request->name,
                // );

                //Mail::to('kamrulzamantonmoy@gmail.com')->send(new Contactmail($data));

                //Mail::to($request->email)->send(new ContactDefualtmail());


                $data       =   array(
                    "name"    =>   $request->name,
                    "email"    =>   $request->email,
                );

                dispatch(new DefaultContactEmailJob($data));
                dispatch(new SendContactUserEmailJob($data));
                
            }else{
                return back()->with("error", "Your Information not sent.");
            }
          

            return Redirect()->route('index')->with("status", "Your message has been received, We'll get back to you shortly.");
      

    }


    public function counsellstore(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'Phone Number' => 'required',
            
        ];
    
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);



       
            $counsell = new Counsell();
            $counsell->name = $request->name;
            $counsell->email = $request->email;
            $counsell->phone = $request->phone;
            $counsell->count = 1;
            
            
            if(!empty($counsell->save())){

                $data       =   array(
                    "name"    =>   $request->name,
                    "email"    =>   $request->email,
                );

                $counsell->save();
                dispatch(new DefaultEmailJob($data));
                dispatch(new SendUserEmailJob($data));
                // Mail::to($request->email)->send(new Counselmail()); //default mail j pataise
                // Mail::to('kamrulzamantonmoy@gmail.com')->send(new counselladminmail($data));

                return Redirect()->route('index')->with("status", "Your message has been received, We'll get back to you shortly.");

                }else{
                    return back()->with("error", "Your Information not sent.");
                }

                return back();


    }



    









       
}
