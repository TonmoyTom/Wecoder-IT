<?php

namespace App\Http\Controllers\Addmission;

use App\Adform;
use App\Category;
use App\Http\Controllers\Controller;
use App\Jobs\Addmission\SendAddmissionAdminEmailJob;
use App\Mail\addmissionmail;
use App\Mail\defualtmail;
use App\Mail\Sendmail;
use Illuminate\Http\Request;
use App\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class AddformController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $admins;

    public function __construct()
    {
        
        $this->middleware(function($request,$next){
            $this->admins =Auth::guard('admin')->user();
            return $next($request);
        });
    }
    

    public function index()
    {
        if(is_null($this->admins) || !$this->admins->can('addmission.all')){
            abort(403,'Not Access');
        }
       
        $addmission =  Adform::orderBy('id', 'DESC')->get();
       

     
        return view('Admin.addmissionform.index',compact('addmission'));
    }

    public function view($id)
    {

        if(is_null($this->admins) || !$this->admins->can('addmission.view')){
            abort(403,'Not Access');
        }
       
        $ids =  Crypt::decrypt($id);
        $category = Category::where(['status'=> 1,'approve'=> 1])->get();
        $addmission = Adform::findOrFail($ids);
        $subcategory =Subcategory::where(['status'=> 1,'approve'=> 1])->get();
        return view('Admin.addmissionform.view',compact('addmission','category','subcategory'));
    }

    public function edit($id)
    {

        if(is_null($this->admins) || !$this->admins->can('addmission.edit')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $addmission = Adform::findOrFail($ids);
        return view('Admin.addmissionform.edit',compact('addmission'));
    }





    public function update(Request $request, $id){
        if(is_null($this->admins) || !$this->admins->can('addmission.update')){
            abort(403,'Not Access');
        }
       
        $validatedData = $request->validate([
            'name' => 'required|',
            'email' => 'required|',
            'subject' =>  'required|',
            'message' =>  'required|',
            
        ]); 

        $ids =  Crypt::decrypt($id);
       

       
        $data       =   array(
            "name"    =>   $request->name,
            "message"    =>   $request->message,
            "email"    =>   $request->email,
            "subject"    =>   $request->subject,
        );

        


        //  Mail::to($toemail)->send(new Sendmail($data));
        dispatch(new SendAddmissionAdminEmailJob($data));


           
          if(Mail::failures() != 0) {
            $counsell  = Adform::where('id',$ids)->update(['status' => 1,'count'=> 0]);
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'success'
                 );
               return Redirect()->route('addmission.all')->with($notification);
        }else {
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
        }
       
    }


    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('addmission.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Adform::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Admission Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
           
    }


    


}
