<?php

namespace App\Http\Controllers\Leader;

use App\Http\Controllers\Controller;
use App\Leader;
use Illuminate\Http\Request;
use App\Rules\MaxWordsRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Cache;

class LeaderController extends Controller
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

        if(is_null($this->admins) || !$this->admins->can('leaders.all')){
            abort(403,'Not Access');
        }

        $leaders =  Leader::orderBy('id', 'DESC')->get();
        $leadersupdate =  Leader::query()->update(['count' => 1]);
      
        
        return view('Admin.leader.index',compact('leaders','leadersupdate'));
    }

    public function store(Request $request)
    {
        if(is_null($this->admins) || !$this->admins->can('leaders.allstore')){
            abort(403,'Not Access');
        }
        
        $validatedData = $request->validate([
            'name' => 'required|',
            'title' => 'required|',
            'slug' => 'required|unique:leaders,slug',
            'imagename' => 'image|required|mimetypes:image/jpeg,image/png,image/jpg|max:2000',
            'detalis' => new MaxWordsRule(250),
            
        ]); 

            // $data =$request->all();
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
       

            $leaders = new Leader();
            $leaders->name = $request->name;
            $leaders->title = $request->title;
            $str = strtolower($request->slug);
            $leaders->slug =  preg_replace('/\s+/','-',$str);
            $leaders->detalis = strip_tags($request->detalis);
            $image_one=$request->imagename;

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('Image/Leaders/'.$image_one_name);
                $leaders->imagename = $image_one_name;


           $leaders->save();     
     
          

        $notification=array(
            'messege'=>'Leaders Insert successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->route('leaders.all')->with($notification);
        



    }

    public function leadersstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Leader::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('leaders.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $leaders = Leader::findOrFail($ids);
        return view('Admin.leader.edit', compact('leaders'));
    }

    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('leaders.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $leaders = Leader::findOrFail($ids);
        return view('Admin.leader.view', compact('leaders'));
    }

    public function update(Request $request ,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('leaders.update')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $validatedData = $request->validate([
            'name' => 'required|',
            'title' => 'required|',
            'slug' => "required|alpha_dash|unique:leaders,slug, $ids",
            'detalis' => new MaxWordsRule(250),
            
            
        ]); 

      

        //  $data =$request->all();
        //     echo "<pre>";
        //     print_r($data);
        //     echo "</pre>";
        $leaders = Leader::findOrFail($ids);

        $leaders->name = $request->name;
        $leaders->title = $request->title;
        $str = strtolower($request->slug);
        $leaders->slug = preg_replace('/\s+/','-',$str);
        $leaders->detalis = strip_tags($request->detalis);
        $image_one=$request->imagename;

          
       if(empty($request->file('imagename'))){
        $update = $leaders->save();
    }else{

        if ($request->file('imagename')) {

  
            $file_old = 'Image/Leaders/'.$leaders->imagename;
            unlink($file_old);

            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(80,80)->save('Image/Leaders/'.$image_one_name);
            $leaders->imagename = $image_one_name;
            $leaders->save();

           
         }
    }

    
       $leaders->save();



       
    
    //    $facilites->save();

          

        $notification=array(
            'messege'=>'Leaders Update successfully!',
            'alert-type'=>'success'
             );
             return Redirect()->route('leaders.all')->with($notification);
        

    }




    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('leaders.delete')){
            abort(403,'Not Access');
        }
        $ids =  Crypt::decrypt($id);
        $leaders = Leader::findOrFail($ids);
        
        if(!is_null($leaders)){
            $file_old = 'Image/Leaders/'.$leaders->imagename;
            unlink($file_old);
            $leaders->delete();
        }else{
            echo "False";
        }

        $notification=array(
            'messege'=>'Leaders Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
        
       
    }
}
