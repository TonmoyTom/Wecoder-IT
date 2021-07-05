<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReviewController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('reviews.all')){
            abort(403,'Not Access');
        }
    

        $reviews =   Review::orderBy('id', 'DESC')->get();

        $reviewsupdate =  Review::query()->update(['count' => 1]);
        return view('Admin.review.index',compact('reviews'));
    }

    public function store(Request $request)
    {

        
        if(is_null($this->admins) || !$this->admins->can('reviews.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'link' => 'required|',
            'slug' => 'required|unique:reviews,slug',
            
        ]); 


       
            $reviews = new Review();
            $reviews->link = $request->link;
            $str = strtolower($request->slug);
            $reviews->slug = preg_replace('/\s+/','-',$str);
            $reviews->save();     
     
          

        $notification=array(
            'messege'=>'Reviews Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('reviews.all')->with($notification);

    }

    public function reviewsstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Review::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }


    
    public function edit($id){

        
        if(is_null($this->admins) || !$this->admins->can('reviews.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $reviews = Review::findOrFail($ids);
        return view('Admin.review.edit', compact('reviews'));
    }

    public function update(Request $request ,$id)
    {
        
        if(is_null($this->admins) || !$this->admins->can('reviews.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'link' => 'required|',
            'slug' => "required|unique:reviews,slug, $ids",
            
        ]);

      
        $reviews = Review::findOrFail($ids);
        $reviews->link = $request->link;
        $str = strtolower($request->slug);
        $reviews->slug = preg_replace('/\s+/','-',$str);
        $reviews->save();  
       

        $notification=array(
         'messege'=>'Reviews Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('reviews.all')->with($notification);
    }

    
    public function delete($id){

        
        if(is_null($this->admins) || !$this->admins->can('reviews.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Review::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Reviews Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }




}
