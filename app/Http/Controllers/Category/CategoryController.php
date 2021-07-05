<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
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

        
        if(is_null($this->admins) || !$this->admins->can('categories.all')){
            abort(403,'Not Access');
        }

        $category =   Category::orderBy('id', 'DESC')->get();
        $categoryupdate =  Category::query()->update(['count' => 1]);
    
        
        return view('Admin.course.category.index',compact('category','categoryupdate'));
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('categories.allstore')){
            abort(403,'Not Access');
        }

        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => 'required|unique:categories,slug',
            
        ]); 


       
            $category = new Category();
            $category->name = $request->name;
            $str = strtolower($request->slug);
            $category->slug =  preg_replace('/\s+/','-',$str);
            $category->save();     
     
          

        $notification=array(
            'messege'=>'Category Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('categories.all')->with($notification);

    }


    
    public function categoriesstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Category::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function edit($id){
        if(is_null($this->admins) || !$this->admins->can('categories.edit')){
            abort(403,'Not Access');
        }
       
        $categorys = Category::findOrFail($id);
        return view('Admin.course.category.index', compact('categorys'));
    }


    public function update(Request $request ,$id)
    {
        if(is_null($this->admins) || !$this->admins->can('categories.update')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => "required|unique:categories,slug , $id",
            
        ]);

      
        $achive = Category::findOrFail($id);

        $achive->name = $request->name;
        $str = strtolower($request->slug);
        $achive->slug =  preg_replace('/\s+/','-',$str);
        $achive->save();
  
       

        $notification=array(
         'messege'=>'categories Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('categories.all')->with($notification);
    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('categories.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Category::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'Category Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
