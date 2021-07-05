<?php

namespace App\Http\Controllers\Counselly;

use App\Counsell;
use App\Http\Controllers\Controller;
use App\Jobs\Counsell\SendAdminEmailJob;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CounsellyController extends Controller
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
    
        if(is_null($this->admins) || !$this->admins->can('counsell.all')){
            abort(403,'Not Access');
        }
        $counsell =    Counsell::orderBy('id', 'DESC')->get();
     

        return view('Admin.counselling.index',compact('counsell'));
    }


   

    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('counsell.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $categorys = Counsell::findOrFail($ids);
        return view('Admin.counselling.edit', compact('categorys'));
    }



    public function update(Request $request, $id){
        if(is_null($this->admins) || !$this->admins->can('counsell.update')){
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

            


            //Mail::to($toemail)->send(new Consellsendmail($data,$subject));

        dispatch(new SendAdminEmailJob($data));

          
       

        if(Mail::failures() != 0) {
            $counsell  = Counsell::where('id',$ids)->update(['mailsent' => 1,'count'=> 0]);
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'success'
                 );
               return Redirect()->route('counsell.all')->with($notification);
        }else {
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
        }


        
       
    }


    
    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('counsell.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Counsell::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Counsell Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }

}
