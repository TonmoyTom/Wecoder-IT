<?php

namespace App\Http\Controllers\Contact;

use App\Contactmsg;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class ContactmsgController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('contactdetalis.all')){
            abort(403,'Not Access');
        }

        $contactmsg =  Contactmsg::orderBy('id', 'DESC')->get();
       
        $contactmsgupdate =  Contactmsg::query()->update(['count' => 1]);
        return view('Admin.contactmsg.index', compact('contactmsg','contactmsgupdate'));
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('contactdetalis.allstore')){
            abort(403,'Not Access');
        }

        $validatedData = $request->validate([
            
            'address' =>  'required',
            'phone1' =>  'required',
            'phone2' =>  'required',
            'email' =>  'required',
            'email2' =>  'required',
            'detalis' =>  'required',
            
        ]);


       
        $contactmsg = new Contactmsg();
        $contactmsg->address = $request->address;
        $contactmsg->phone1 = $request->phone1;
        $contactmsg->phone2 = $request->phone2;
        $contactmsg->email = $request->email;
        $contactmsg->email2 = $request->email2;
        $contactmsg->detalis = $request->detalis;


            

        $contactmsg->save();
     
          

        $notification=array(
            'messege'=>'Contact Details Insert successfully!',
            'alert-type'=>'success'
             );
        return Redirect()->route('contactdetalis.all')->with($notification);
    }


    public function contactdetalisstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Contactmsg::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function view($id){

        
        if(is_null($this->admins) || !$this->admins->can('contactdetalis.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $contactmsg = Contactmsg::findOrFail($ids);
        return view('Admin.contactmsg.view', compact('contactmsg'));
    }


    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('contactdetalis.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $contactmsg = Contactmsg::findOrFail($ids);
        return view('Admin.contactmsg.edit', compact('contactmsg'));
    }

    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('contactdetalis.update')){
            abort(403,'Not Access');
        }
     
        $validatedData = $request->validate([
            'address' =>  'required',
            'phone1' =>  'required',
            'phone2' =>  'required',
            'email' =>  'required',
            'email2' =>  'required',
            'detalis' =>  'required',
            
            
        ]);

        $ids =  Crypt::decrypt($id);
        $contactmsg = Contactmsg::findOrFail($ids);

        $contactmsg->address = $request->address;
        $contactmsg->phone1 = $request->phone1;
        $contactmsg->phone2 = $request->phone2;
        $contactmsg->email = $request->email;
        $contactmsg->email2 = $request->email2;
        $contactmsg->detalis = $request->detalis;


        $contactmsg->save();
  
       

        $notification=array(
         'messege'=>'Contact Detalis Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('contactdetalis.all')->with($notification);
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('contactdetalis.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $about = Contactmsg::findOrFail($ids);
        if(!is_null($about)){
            $about->delete();
        }

        
        $notification=array(
            'messege'=>'Contact Detalis Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }

}
