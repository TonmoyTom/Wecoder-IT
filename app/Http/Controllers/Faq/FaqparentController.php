<?php

namespace App\Http\Controllers\Faq;

use App\Faqparent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class FaqparentController extends Controller
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
        if(is_null($this->admins) || !$this->admins->can('faqparents.all')){
            abort(403,'Not Access');
        }
        $faqtitles =    Faqparent::orderBy('id', 'DESC')->get();

        $faqtitlesupdate =  Faqparent::query()->update(['count' => 1]);
      
    
       
        return view('Admin.faqparent.index',compact('faqtitles','faqtitlesupdate'));
    } 


    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('faqparents.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'faqtitle' => 'required|',
            'slug' => 'required|unique:faqparents,slug',
            
        ]); 


       
            $faqtitles = new Faqparent();
            $faqtitles->faqtitle = $request->faqtitle;

            $str = strtolower($request->slug);
            $faqtitles->slug = preg_replace('/\s+/','-',$str);
            $faqtitles->save();     
     
          

        $notification=array(
            'messege'=>'Faq Title Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('faqparents.all')->with($notification);

    }


      
    public function faqparentssstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Faqparent::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('faqparents.update')){
            abort(403,'Not Access');
        }
       
        $validatedData = $request->validate([
            'faqtitle' => 'required|',
            'slug' => "required|unique:faqparents,slug, $id",
            
        ]);

      
            $faqtitles = Faqparent::findOrFail($id);

            $faqtitles->faqtitle = $request->faqtitle;

            $str = strtolower($request->slug);
            $faqtitles->slug = preg_replace('/\s+/','-',$str);
            $faqtitles->save();   
  
       

        $notification=array(
         'messege'=>'Faq Title Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('faqparents.all')->with($notification);
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('faqparents.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Faqparent::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Faq Title Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
