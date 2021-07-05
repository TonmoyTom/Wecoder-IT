<?php

namespace App\Http\Controllers\Jobplacement;

use App\Http\Controllers\Controller;
use App\Jobplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class JobplacementController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('jobplacement.all')){
            abort(403,'Not Access');
        }
    

        $jobplacement =  Jobplacement::orderBy('id', 'DESC')->get();

        $jobplacementupdate =  Jobplacement::query()->update(['count' => 1]);
       
    
        
        return view('Admin.jobs.index',compact('jobplacement','jobplacementupdate'));
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('jobplacement.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'slug' => 'required|unique:jobplacements,slug',
            'jobsdetalis' =>  'required'
            
        ]); 


       
            $jobplacement = new Jobplacement();
            $str = strtolower($request->slug);
            $jobplacement->slug =  preg_replace('/\s+/','-',$str);
            $jobplacement->jobsdetalis = $request->jobsdetalis;


            

           $jobplacement->save();     
     
          

        $notification=array(
            'messege'=>'JobPlacement Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('jobplacement.all')->with($notification);

    }


    public function jobssstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Jobplacement::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('jobplacement.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $jobplacement = Jobplacement::findOrFail($ids);
        return view('Admin.jobs.view', compact('jobplacement'));
    }


    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('jobplacement.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $jobplacement = Jobplacement::findOrFail($ids);
        return view('Admin.jobs.edit', compact('jobplacement'));
    }

    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('jobplacement.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'slug' => "required|unique:jobplacements,slug, $ids",
            'jobsdetalis' =>  'required'
            
        ]);

       
        $jobplacement = Jobplacement::findOrFail($ids);
        $str = strtolower($request->slug);
        $jobplacement->slug =  preg_replace('/\s+/','-',$str);
        $jobplacement->jobsdetalis = $request->jobsdetalis;


        $jobplacement->save();


        $notification=array(
         'messege'=>'Jobplacement Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('jobplacement.all')->with($notification);
    }


    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('jobplacement.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $Jobplacement = Jobplacement::findOrFail($ids);
        if(!is_null($Jobplacement)){
            $Jobplacement->delete();
        }

        
        $notification=array(
            'messege'=>'Jobplacement Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
