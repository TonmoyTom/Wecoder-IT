<?php

namespace App\Http\Controllers\Contact;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Jobs\Contact\SendContactAdminEmailJob;
use Illuminate\Http\Request;
use App\Mail\contact\Contactmail;
use App\Mail\contact\defualtmail as ContactDefualtmail;
use App\Mail\contact\sendmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    

    public function index()
    {


         
        if(is_null($this->admins) || !$this->admins->can('contact.all')){
            abort(403,'Not Access');
        }
        $contact =  Contact::where(['status' => 1, 'approve' => 1])->orderBy('id', 'DESC')->get();
        
        
        return view('Admin.contact.index',compact('contact'));
    }

    public function view($id)
    {

        if(is_null($this->admins) || !$this->admins->can('contact.view')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $contact = Contact::findOrFail($ids);
        return view('Admin.contact.view',compact('contact'));
    }

    
    public function edit($id)
    {

        if(is_null($this->admins) || !$this->admins->can('contact.edit')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $contact = Contact::findOrFail($ids);
        return view('Admin.contact.edit',compact('contact'));
    }

    public function update(Request $request, $id){

        if(is_null($this->admins) || !$this->admins->can('contact.update')){
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

          //Mail::to($toemail)->send(new sendmail($subject,$data));

         $contactmail = dispatch(new SendContactAdminEmailJob($data));



           
          if($contactmail) {
            $counsell  = Contact::where('id',$ids)->update(['status' => 1,'count'=> 0]);
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'success'
                 );
               return Redirect()->route('contact.all')->with($notification);
        }else {
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
        }
       
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('contact.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Contact::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Contact Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }



}
