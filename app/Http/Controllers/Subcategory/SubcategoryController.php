<?php

namespace App\Http\Controllers\Subcategory;

use App\Category;
use App\Http\Controllers\Controller;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class SubcategoryController extends Controller
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
    

        if(is_null($this->admins) || !$this->admins->can('subcategories.all')){
            abort(403,'Not Access');
        }

        $subcategory =   Subcategory::with('category')->orderBy('id', 'DESC')->get();

        $subcategoryupdate =  Subcategory::query()->update(['count' => 1]);
       
          
        $category = Category::Where(['status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();
        return view('Admin.course.subcategory.index',compact('subcategory','category','subcategoryupdate'));
    }


    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('subcategories.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'sname' => 'required|',
            'category_id' => 'required|',
            'sslug' => 'required|unique:subcategories,slug',
            
        ]); 


       
            $subcategory = new Subcategory();
            $subcategory->category_id = $request->category_id;

            $subcategory->name = $request->sname;

            $str = strtolower($request->sslug);
            $subcategory->slug = preg_replace('/\s+/','-',$str);
            $subcategory->save();     
     
          

        $notification=array(
            'messege'=>'Subcategory Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('subcategories.all')->with($notification);

    }

    public function subcategoriesstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Subcategory::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }


    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('subcategories.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $subcategory = Subcategory::findOrFail($ids);
        $category = Category::Where(['status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();
        return view('Admin.course.subcategory.edit', compact('category','subcategory'));
    }



    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('subcategories.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'sname' => 'required|',
            'sslug' => "required|unique:subcategories,slug, $ids",
            
        ]);

      
        $subcategory = Subcategory::findOrFail($ids);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->sname;
        $subcategory->slug = $request->sslug;
        $subcategory->save();
  
       

        $notification=array(
         'messege'=>'SubCategories Update successfully!',
         'alert-type'=>'success'
          );
        return Redirect()->route('subcategories.all')->with($notification);
    }


    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('subcategories.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $achive = Subcategory::findOrFail($ids);
        if(!is_null($achive)){
            $achive->delete();
        }
        $notification=array(
            'messege'=>'SubCategory Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }

}
