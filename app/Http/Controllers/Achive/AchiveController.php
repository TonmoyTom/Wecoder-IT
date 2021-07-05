<?php

namespace App\Http\Controllers\Achive;

use App\Achive;
use App\Rules\MaxWordsRule;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class AchiveController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('Achive.all')){
            abort(403,'Not Access');
        }
        
        $achive =    Achive::orderBy('id', 'DESC')->get();

        $achiveupdate =  Achive::query()->update(['count' => 1]);
        
  
        return view('Admin.achive.index',compact('achive','achiveupdate'));
    }

    public function create()
    {

        if(is_null($this->admins) || !$this->admins->can('Achive.create')){
            abort(403,'Not Access');
        }
        return view('Admin.achive.create');
    }

    public function store(StoreRequest $request)
    {

        if(is_null($this->admins) || !$this->admins->can('Achive.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => 'required|unique:achives,slug',
            'shottitle' =>  new MaxWordsRule(65),
            
        ]); 


       
            $achive = new Achive();
            $achive->name = $request->name;
            $str = strtolower($request->slug);
            $achive->slug =preg_replace('/\s+/','-',$str);
            $achive->shottitle = strip_tags($request->shottitle);


            

           $achive->save();     
     
          

        $notification=array(
            'messege'=>'Achive Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('Achive.all')->with($notification);

    }

    public function Achivestatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Achive::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    
    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('Achive.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Achive::findOrFail($ids);
        return view('Admin.achive.edit', compact('achive'));
    }

    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('Achive.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Achive::findOrFail($ids);
        return view('Admin.achive.view', compact('achive'));
    }


    public function update(StoreRequest $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('Achive.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => "required|unique:achives,slug, $ids",
            'shottitle' =>  new MaxWordsRule(65),
            
        ]);

      
        $achive = Achive::findOrFail($ids);

        $achive->name = $request->name;
        $str = strtolower($request->slug);
        $achive->slug =preg_replace('/\s+/','-',$str);
        $achive->shottitle = strip_tags($request->shottitle);


        $achive->save();
  
       

        $notification=array(
         'messege'=>'Achive Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('Achive.all')->with($notification);
    }

    
    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('Achive.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Achive::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }

        
        $notification=array(
            'messege'=>'Achivement Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
