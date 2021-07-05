<?php

namespace App\Http\Controllers\Logo;

use App\Http\Controllers\Controller;
use App\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\ImageManagerStatic as Image;

class LogoController extends Controller
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
        
    if(is_null($this->admins) || !$this->admins->can('logos .all')){
        abort(403,'Not Access');
    }


      $logos =   Logo::orderBy('id', 'DESC')->first();

       $logosupdate =  Logo::query()->update(['count' => 1]);
        // Artisan::call('cache:clear');
        return view('Admin.logo.index',compact('logos','logosupdate'));
    }

    
    public function create()
    {
        if(is_null($this->admins) || !$this->admins->can('logos.create')){
            abort(403,'Not Access');
        }
        return view('Admin.logo.create');
    }

    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('logos.allstore')){
            abort(403,'Not Access');
        }
        $validatedData = $request->validate([
            'slug' => 'required|unique:logos,slug',
            'imagename' => 'image|required|mimetypes:image/jpeg,image/png,image/jpg|max:2000',
            
        ]); 

       
            $banners = new Logo();
            $str = strtolower($request->slug);
            $banners->slug = preg_replace('/\s+/','-',$str);
            $image_one=$request->imagename;

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(150,150)->save('Image/Logo/'.$image_one_name);
                $banners->imagename = $image_one_name;


           $banners->save();     
     
          

        $notification=array(
            'messege'=>'Logo Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('logos.all')->with($notification);
        



    }

    public function logosstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Logo::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('logos.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $logos = Logo::findOrFail($ids);
        return view('Admin.logo.edit', compact('logos'));
    }


    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('logos.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'slug' => "required|unique:logos,slug, $ids",
            
        ]); 

      
        $logos = Logo::findOrFail($ids);

        
        $str = strtolower($request->slug);
        $logos->slug = preg_replace('/\s+/','-',$str);
        $image_one=$request->imagename;


       if(empty($request->file('imagename'))){
        $update = $logos->save();
    }else{

        if ($request->file('imagename')) {

  
            $file_old = 'Image/Logo/'.$logos->imagename;
            unlink($file_old);

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(150,150)->save('Image/Logo/'.$image_one_name);
            $logos->imagename = $image_one_name;
            $logos->save();

           
         }
    }

    
       $logos->save();

          

        $notification=array(
            'messege'=>'Logo Update successfully!',
            'alert-type'=>'success'
             );
             return Redirect()->route('logos.all')->with($notification);
        

    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('logos.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $logos = Logo::findOrFail($ids);
        if(!is_null($logos)){
            $file_old = 'Image/Logo/'.$logos->imagename;
            unlink($file_old);
            $logos->delete();
        }

        
        $notification=array(
            'messege'=>'Logo Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
