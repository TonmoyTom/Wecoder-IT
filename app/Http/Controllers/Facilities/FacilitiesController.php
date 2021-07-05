<?php

namespace App\Http\Controllers\Facilities;

use App\Facilite;
use App\Http\Controllers\Controller;
use App\Rules\MaxWordsRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class FacilitiesController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('facilities.all')){
            abort(403,'Not Access');
        }

        $facilities =   Facilite::orderBy('id', 'DESC')->get();
        $facilitiesupdate =  Facilite::query()->update(['count' => 1]);
     
        return view('Admin.facilities.index',compact('facilities','facilitiesupdate'));
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('facilities.allstore')){
            abort(403,'Not Access');
        }

        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => 'required|unique:facilites,slug',
            'imagename' => 'image|required|mimetypes:image/png|max:2000',
            'detalis' => new MaxWordsRule(250),
            
        ]); 

            // $data =$request->all();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
       

            $facilites = new Facilite();
            $facilites->name = $request->name;
            $str = strtolower($request->slug);
            $facilites->slug =  preg_replace('/\s+/','-',$str);
            $facilites->detalis = strip_tags($request->detalis);
            $image_one=$request->imagename;

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(80,80)->save('Image/Facilities/'.$image_one_name);
                $facilites->imagename = $image_one_name;


           $facilites->save();     
     
          

        $notification=array(
            'messege'=>'Facilites Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('facilities.all')->with($notification);
        



    }

    public function facilitiesstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Facilite::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }


    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('facilities.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $facilites = Facilite::findOrFail($ids);
        return view('Admin.facilities.edit', compact('facilites'));
    }

    
    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('facilities.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $facilites = Facilite::findOrFail($ids);
        return view('Admin.facilities.view', compact('facilites'));
    }


    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('facilities.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => "required|unique:facilites,slug, $ids",
            'detalis' => 'required|',
            
            
        ]); 

      

        //  $data =$request->all();
        //     echo "<pre>";
        //     print_r($data);
        //     echo "</pre>";
        $facilites = Facilite::findOrFail($ids);

        $facilites->name = $request->name;
        $str = strtolower($request->slug);
        $facilites->slug =  preg_replace('/\s+/','-',$str);
        $facilites->detalis = $request->detalis;
        $image_one=$request->imagename;

          
       if(empty($request->file('imagename'))){
        $update = $facilites->save();
    }else{

        if ($request->file('imagename')) {

  
            $file_old = 'Image/Facilities/'.$facilites->imagename;
            unlink($file_old);

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(80,80)->save('Image/Facilities/'.$image_one_name);
            $facilites->imagename = $image_one_name;
            $facilites->save();

           
         }
    }

    
       $facilites->save();



       
    
    //    $facilites->save();

          

        $notification=array(
            'messege'=>'Facilites Update successfully!',
            'alert-type'=>'success'
             );
             return Redirect()->route('facilities.all')->with($notification);
        

    }



    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('facilities.delete')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $banner = Facilite::findOrFail($ids);
        
        if(!is_null($banner)){
            $file_old = 'Image/Facilities/'.$banner->imagename;
            unlink($file_old);
            $banner->delete();
        }else{
            echo "False";
        }

        $notification=array(
            'messege'=>'Facilites Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }




}
