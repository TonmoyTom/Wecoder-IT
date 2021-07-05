<?php

namespace App\Http\Controllers\About;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class AboutController extends Controller
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


        if(is_null($this->admins) || !$this->admins->can('about.all')){
            abort(403,'Not Access');
        }

        $about =  About::orderBy('id', 'DESC')->get();
        $aboutupdate =  About::query()->update(['count' => 1]);
        return view('Admin.about.index',compact('about','aboutupdate'));
    }


    public function store(Request $request)
    {

        
        if(is_null($this->admins) || !$this->admins->can('about.allstore')){
            abort(403,'Not Access');
        }

        $validatedData = $request->validate([
            'slug' => 'required|unique:abouts,slug',
            'aboutsdetalis' =>  'required'
            
        ]); 


       
            $about = new About();
            $str = strtolower($request->slug);
            $about->slug =  preg_replace('/\s+/','-',$str);
            $about->aboutsdetalis = $request->aboutsdetalis;

           $about->save();     
     
          

        $notification=array(
            'messege'=>'About Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('abouts.all')->with($notification);

    }
    

    public function aboutssstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        About::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function view($id){

        
        
        if(is_null($this->admins) || !$this->admins->can('about.view')){
            abort(403,'Not Access');
        }


        $ids =  Crypt::decrypt($id);
        $about = About::findOrFail($ids);
        return view('Admin.about.view', compact('about'));
    }

    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('about.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $about = About::findOrFail($ids);
        return view('Admin.about.edit', compact('about'));
    }

    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('about.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'slug' => "required|unique:abouts,slug, $ids",
            'aboutsdetalis' =>  'required'
            
        ]);

      
        $about = About::findOrFail($ids);

        $str = strtolower($request->slug);
        $about->slug =  preg_replace('/\s+/','-',$str);
        $about->aboutsdetalis = $request->aboutsdetalis;


        $about->save();
  
       

        $notification=array(
         'messege'=>'About Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('abouts.all')->with($notification);
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('about.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $about = About::findOrFail($ids);
        if(!is_null($about)){
            $about->delete();
        }

        
        $notification=array(
            'messege'=>'About Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }

}
