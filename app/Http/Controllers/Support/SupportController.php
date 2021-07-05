<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class SupportController extends Controller
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


        if(is_null($this->admins) || !$this->admins->can('support.all')){
            abort(403,'Not Access');
        }
        $support =   Support::orderBy('id', 'DESC')->get();

        $supportupdate =  Support::query()->update(['count' => 1]);
       
    
       
        return view('Admin.support.index',compact('support','supportupdate'));
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('support.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'slug' => 'required|unique:supports,slug',
            'support' =>  'required',
            'facebook' =>  'required',
            'twitter' =>  'required',
            'linkdin' =>  'required',
            'googleplus' =>  'required',
            'github' =>  'required',
            
        ]); 


       
            $support = new Support();

            
            $str = strtolower($request->slug);
            $support->slug = preg_replace('/\s+/','-',$str);
            $support->support = $request->support;
            $support->facebook = $request->facebook;
            $support->twitter = $request->twitter;
            $support->linkdin = $request->linkdin;
            $support->googleplus = $request->googleplus;
            $support->github = $request->github;

           $support->save();     
     
          

        $notification=array(
            'messege'=>'Support Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('support.all')->with($notification);

    }

    public function supportstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Support::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }


    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('support.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $support = Support::findOrFail($ids);
        return view('Admin.support.view', compact('support'));
    }

    
    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('support.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $support = Support::findOrFail($ids);
        return view('Admin.support.edit', compact('support'));
    }

    public function update(Request $request ,$id)
    {
     
        $validatedData = $request->validate([
            'slug' => "required|unique:supports,slug, $id",
            'support' =>  'required',
            'facebook' =>  'required',
            'twitter' =>  'required',
            'linkdin' =>  'required',
            'googleplus' =>  'required',
            'github' =>  'required',
            
        ]);

        $ids =  Crypt::decrypt($id);
        $support = Support::findOrFail($ids);
        $str = strtolower($request->slug);
        $support->slug =  preg_replace('/\s+/','-',$str);
        $support->support = $request->support;
        $support->facebook = $request->facebook;
        $support->twitter = $request->twitter;
        $support->linkdin = $request->linkdin;
        $support->googleplus = $request->googleplus;
        $support->github = $request->github;

        $support->save();


        $notification=array(
         'messege'=>'Support Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('support.all')->with($notification);
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('support.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Support::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Support Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }

}
