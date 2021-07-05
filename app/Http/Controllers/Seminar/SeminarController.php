<?php

namespace App\Http\Controllers\Seminar;

use App\Http\Controllers\Controller;
use App\Seminar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class SeminarController extends Controller
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

        
        if(is_null($this->admins) || !$this->admins->can('seminars.all')){
            abort(403,'Not Access');
        }
       

       $seminars =  Seminar::orderBy('id', 'DESC')->get();
       $seminarsupdate =  Seminar::query()->update(['count' => 1]);
        

        return view('Admin.seminar.index',compact('seminars','seminarsupdate'));
       
       
        
       
    } 

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('seminars.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'slug' => 'required|unique:seminars,slug',
            'topic' =>  'required',
            'vedio_link' =>  'required',
            'join_link' =>  'required',
            'datetime' =>  'required',
            
        ]); 


        // $data = $request->all();
        // dd($data);
        // die();


       
            $seminer = new Seminar();
            $str = strtolower($request->slug);
            $seminer->slug = preg_replace('/\s+/','-',$str);
            $seminer->topic = $request->topic;
            $seminer->vedio_link = $request->vedio_link;
            $seminer->join_link = $request->join_link;
            

            $datetime = Carbon::createFromFormat('d-M-y g:i A', $request->datetime)->format('Y-m-d H:i:s');
         
            $seminer->datetime =  $datetime;
            $seminer->save();     
     
          

        $notification=array(
            'messege'=>'Seminer Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('seminars.all')->with($notification);

    }


    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('seminars.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $seminer = Seminar::findOrFail($ids);

     
        return view('Admin.seminar.edit', compact('seminer'));
    }


    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('seminars.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $seminer = Seminar::findOrFail($ids);

     
        return view('Admin.seminar.view', compact('seminer'));
    }

    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('seminars.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);

        $validatedData = $request->validate([
            'slug' => "required|unique:faqparents,slug, $ids",
            'topic' =>  'required',
            'vedio_link' =>  'required',
            'join_link' =>  'required',
            'datetime' =>  'required',
           
            
        ]);

            
            $seminer = Seminar::findOrFail($ids);
            $str = strtolower($request->slug);
            $seminer->slug = preg_replace('/\s+/','-',$str);
            $seminer->topic = $request->topic;
            $seminer->vedio_link = $request->vedio_link;
            $seminer->join_link = $request->join_link;   
            $datetime = Carbon::createFromFormat('d-M-y g:i A', $request->datetime)->format('Y-m-d H:i:s');
         
            $seminer->datetime =  $datetime;

        

            $seminer->save();   
  
       

        $notification=array(
         'messege'=>'Seminer Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('seminars.all')->with($notification);
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('seminars.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Seminar::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'SeminerDelete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
