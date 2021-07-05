<?php

namespace App\Http\Controllers\Faq;

use App\Faq;
use App\Faqparent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class FaqController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('faqs.all')){
            abort(403,'Not Access');
        }
    
        $faqs = Faq::with('faqparent')->orderBy('id', 'DESC')->get();
        $faqsupdate =  Faq::query()->update(['count' => 1]);
        $faqtitle =   Faqparent::orderBy('id', 'DESC')->get();


        
        return view('Admin.faqdetalis.index',compact('faqs','faqtitle','faqsupdate'));
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('faqs.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'slug' => 'required|unique:faqs,slug',
            'qustion' =>  'required',
            'answer' =>  'required',
            'faqs_id' =>  'required'
            
        ]); 


       
            $faqs = new Faq();
            $str = strtolower($request->slug);
            $faqs->slug = preg_replace('/\s+/','-',$str);
            $faqs->qustion = $request->qustion;
            $faqs->answer = $request->answer;
            $faqs->faqs_id = $request->faqs_id;
            $faqs->save();     
     
          

        $notification=array(
            'messege'=>'Faq Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('faqs.all')->with($notification);

    }

    public function faqssstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Faq::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('faqs.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $faqtitle = Faqparent::all();
        $faqs = Faq::findOrFail($ids);
        return view('Admin.faqdetalis.view', compact('faqs','faqtitle'));
    }


    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('faqs.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $faqtitle = Faqparent::all();
        $faqs = Faq::findOrFail($ids);
        return view('Admin.faqdetalis.edit', compact('faqs','faqtitle'));
    }


    public function update(Request $request,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('faqs.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'slug' => "required|unique:faqs,slug, $ids",
            'qustion' =>  'required',
            'answer' =>  'required',
            'faqs_id' =>  'required'
            
        ]); 


      
            $faqs = Faq::findOrFail($ids);
            $str = strtolower($request->slug);
            $faqs->slug = preg_replace('/\s+/','-',$str);
            $faqs->qustion = $request->qustion;
            $faqs->answer = $request->answer;
            $faqs->faqs_id = $request->faqs_id;


            

           $faqs->save();     
     
          

        $notification=array(
            'messege'=>'Faq Update successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('faqs.all')->with($notification);

    }


    public function delete($id){


        if(is_null($this->admins) || !$this->admins->can('faqs.delete')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $achive = Faq::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Faq  Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }

}
