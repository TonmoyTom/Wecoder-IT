<?php

namespace App\Http\Controllers\Banner;

use App\Banner;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class BannerController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('banners.all')){
            abort(403,'Not Access');
        }

        $banners =   Banner::orderBy('id', 'DESC')->get();

       $Bannerupdate =  Banner::query()->update(['count' => 1]);
        // Artisan::call('cache:clear');
        return view('Admin.banner.index',compact('banners','Bannerupdate'));
    }

    
    public function create()
    {

        
        if(is_null($this->admins) || !$this->admins->can('banners.create')){
            abort(403,'Not Access');
        }
        
        return view('Admin.banner.create');
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('banners.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => 'required|unique:banners,slug',
            'imagename' => 'image|required|mimetypes:image/jpeg,image/png,image/jpg|max:2000',
            
        ]); 

       
            $banners = new Banner();
            $banners->name = $request->name;
            $str = strtolower($request->slug);
            $banners->slug = preg_replace('/\s+/','-',$str);
            $image_one=$request->imagename;

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(1920,650)->save('Image/Banner/'.$image_one_name);
                $banners->imagename = $image_one_name;


           $banners->save();     
     
          

        $notification=array(
            'messege'=>'Banner Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('banners.all')->with($notification);
        



    }


    public function bannerstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Banner::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }


    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('banners.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $banner = Banner::findOrFail($ids);
        return view('Admin.banner.edit', compact('banner'));
    }

    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('banners.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $banner = Banner::findOrFail($ids);
        return view('Admin.banner.view', compact('banner'));
    }



    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('banners.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'name' => 'required|',
            'slug' => 'required|unique:banners,slug,'.$ids,
            
        ]); 

      
        $banner = Banner::findOrFail($ids);

        $banner->name = $request->name;
        $str = strtolower($request->slug);
        $banner->slug = preg_replace('/\s+/','-',$str);
        $image_one=$request->imagename;


       if(empty($request->file('imagename'))){
        $update = $banner->save();
    }else{

        if ($request->file('imagename')) {

  
            $file_old = 'Image/Banner/'.$banner->imagename;
            unlink($file_old);

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(1920,650)->save('Image/Banner/'.$image_one_name);
            $banner->imagename = $image_one_name;
            $banner->save();

           
         }
    }

    
       $banner->save();

          

        $notification=array(
            'messege'=>'Banner Update successfully!',
            'alert-type'=>'success'
             );
             return Redirect()->route('banners.all')->with($notification);
        

    }


    public function delete($id){

        
        if(is_null($this->admins) || !$this->admins->can('banners.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $banner = Banner::findOrFail($ids);
        if(!is_null($banner)){
            $file_old = 'Image/Banner/'.$banner->imagename;
            unlink($file_old);
            $banner->delete();
        }

        
        $notification=array(
            'messege'=>'Banner Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }



}
