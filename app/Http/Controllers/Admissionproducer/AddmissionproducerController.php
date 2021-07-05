<?php

namespace App\Http\Controllers\Admissionproducer;

use App\Addmissionproducer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AddmissionproducerController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('addmissionproducers.all')){
            abort(403,'Not Access');
        }
    
        $producer = Addmissionproducer::orderBy('id', 'DESC')->get();
        $producerupdate =  Addmissionproducer::query()->update(['count' => 1]);
        return view('Admin.producer.index',compact('producer','producerupdate'));
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('addmissionproducers.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'slug' => 'required|unique:addmissionproducers,slug',
            'addmissiondetalis' =>  'required'
            
        ]); 


       
            $about = new Addmissionproducer();
            $str = strtolower($request->slug);
            $about->slug = preg_replace('/\s+/','-',$str);
            $about->addmissiondetalis = $request->addmissiondetalis;


            

           $about->save();     
     
          

        $notification=array(
            'messege'=>'Addmission Producer Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('addmissionproducers.all')->with($notification);

    }

    public function addmissionproducerssstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Addmissionproducer::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('addmissionproducers.view')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $about = Addmissionproducer::findOrFail($ids);
        return view('Admin.producer.view', compact('about'));
    }

    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('addmissionproducers.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $about = Addmissionproducer::findOrFail($ids);
        return view('Admin.producer.edit', compact('about'));
    }

    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('addmissionproducers.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'slug' => "required|unique:addmissionproducers,slug, $ids",
            'addmissiondetalis' =>  'required'
            
        ]);

       
       $about = Addmissionproducer::findOrFail($ids);

        $str = strtolower($request->slug);
        $about->slug = preg_replace('/\s+/','-',$str);
        $about->addmissiondetalis = $request->addmissiondetalis;


        $about->save();
  
       

        $notification=array(
         'messege'=>'Addmission Producer  Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('addmissionproducers.all')->with($notification);
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('addmissionproducers.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $about = Addmissionproducer::findOrFail($ids);
        if(!is_null($about)){
            $about->delete();
        }

        
        $notification=array(
            'messege'=>'Addmission Producer Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }


}
