<?php

namespace App\Http\Controllers\Post;

use App\Category;
use App\Http\Controllers\Controller;
use App\Mail\post\Postmail as PostPostmail;
use App\Mail\Post\Updatemail;
use App\Notifications\Postmail;
use App\Post;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
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

        
        if(is_null($this->admins) || !$this->admins->can('posts.all')){
            abort(403,'Not Access');
        }
    
        $posts =  Post::orderBy('id', 'DESC')->get();
        $postsupdate =  Post::query()->update(['count' => 1]);
      
        return view('Admin.course.post.index',compact('posts','postsupdate'));

        
    }

    public function create()
    {

        if(is_null($this->admins) || !$this->admins->can('posts.create')){
            abort(403,'Not Access');
        }

        $category =Category::where(['status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();;
        
        return view('Admin.course.post.create',compact('category'));
    }

    
    public function subcat($category_id)
    {

        
        $subcategories =  Subcategory::where(['category_id'=> $category_id,'status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();
            // return response()->json([
            // 'subcategories' => $subcategories
            // ]);
            return json_encode($subcategories);
            // dd($subcategories);
    
    }


    public function store(Request $request)
    {

        if(is_null($this->admins) || !$this->admins->can('posts.allstore')){
            abort(403,'Not Access');
        }
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'imagename' => 'required',
            'shottitle' => 'required',
            'longtitle' => 'required',
            'imagename' => 'image|required|mimetypes:image/jpeg,image/png,image/jpg|max:2000',
            
           
            
        ];
    
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);
            $posts = new Post();
            $posts->name = $request->name;
            $str = strtolower($request->slug);
            $posts->slug = preg_replace('/\s+/','-',$str);
            $posts->category_id = $request->category_id;
            $posts->subcategory_id = $request->subcategory_id;
            $image_one=$request->imagename;
            $posts->shottitle = $request->shottitle;
            $posts->longtitle = $request->longtitle;
            $posts->front = $request->front;


            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(730,350)->save('Image/Post/'.$image_one_name);
            $posts->imagename = $image_one_name;
          
         
                $image_two=$request->imagename;
                $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(290,360)->save('Image/Post/'.$image_two_name);
                $posts->imagename2 = $image_two_name;


                $data       =   array(
                    "name"    =>   $request->name,
                    
                );


               
               
                if($posts->save()){
                    $mail =  Mail::to('kamrulzamantonmoy@gmail.com')->send(new PostPostmail($data));
                    $notification=array(
                        'messege'=>'Post  Insert !',
                        'alert-type'=>'sucess'
                         );
                    return Redirect()->route('posts.all')->with($notification);
                 }else{
                     $notification=array(
                         'messege'=>'Post Not Insert !',
                         'alert-type'=>'error'
                          );
                     return Redirect()->route('posts.create')->with($notification);
                 }
           

            

           
      

    }

    public function edit($id){

        if(is_null($this->admins) || !$this->admins->can('posts.edit')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $category = Category::where(['status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();
        $posts = Post::findOrFail($ids);
        $subcategory =Subcategory::where(['status'=> 1,'approve'=> 1])->get();
        return view('Admin.course.post.edit', compact('posts','category','subcategory'));
        // dd($subcategory);
        // die();
    }

    public function view($id){

        if(is_null($this->admins) || !$this->admins->can('posts.view')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $category = Category::where(['status'=> 1,'approve'=> 1])->orderBy('id', 'DESC')->get();
        $subcategory =Subcategory::where(['status'=> 1,'approve'=> 1])->get();
        $posts = Post::findOrFail($ids);
        return view('Admin.course.post.view', compact('posts','category','subcategory'));
        
    }



    public function update(Request $request,$id)
    {

        if(is_null($this->admins) || !$this->admins->can('posts.update')){
            abort(403,'Not Access');
        }
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'shottitle' => 'required',
            'longtitle' => 'required',
            
            
           
            
        ];
    
        $customMessages = [
            'required' => 'The :attribute field can not be blank.'
        ];
    
        $this->validate($request, $rules, $customMessages);
            $ids =  Crypt::decrypt($id);
            $posts = Post::findOrFail($ids);
            $posts->name = $request->name;
            $str = strtolower($request->slug);
            $posts->slug = preg_replace('/\s+/','-',$str);
            $posts->category_id = $request->category_id;
            $posts->subcategory_id = $request->subcategory_id;
            $image_one=$request->imagename;
            $image_two=$request->imagename2;
            $posts->shottitle = $request->shottitle;
            $posts->longtitle = $request->longtitle;
            $posts->front = $request->front;

        if($request->imagename && $request->imagename2){
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(730,350)->save('Image/Post/'.$image_one_name);
            $posts->imagename = $image_one_name;

            
            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
            Image::make($image_two)->resize(290,360)->save('Image/Post/'.$image_two_name);
            $posts->imagename2 = $image_two_name;

            $data       =   array(
                "name"    =>   $request->name,
                
            );
            if($posts->save()){
                $mail =  Mail::to('kamrulzamantonmoy@gmail.com')->send(new Updatemail($data));
                $notification=array(
                    'messege'=>'Post  Insert !',
                    'alert-type'=>'sucess'
                     );
                return Redirect()->route('posts.all')->with($notification);
             }else{
                 $notification=array(
                     'messege'=>'Image  Not Insert !',
                     'alert-type'=>'error'
                      );
                 return Redirect()->route('posts.create')->with($notification);
             }
            $notification=array(
                'messege'=>'Post Not Insert !',
                'alert-type'=>'error'
                 );
            return Redirect()->route('posts.create')->with($notification);
        }elseif($request->imagename){

                $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(730,350)->save('Image/Post/'.$image_one_name);
                $posts->imagename = $image_one_name;

                $data       =   array(
                    "name"    =>   $request->name,
                    
                );

                if($posts->save()){
                    $mail =  Mail::to('kamrulzamantonmoy@gmail.com')->send(new Updatemail($data));
                    $notification=array(
                        'messege'=>'Post  Insert !',
                        'alert-type'=>'sucess'
                         );
                    return Redirect()->route('posts.all')->with($notification);
                 }else{
                     $notification=array(
                         'messege'=>'Main image Not Insert !',
                         'alert-type'=>'error'
                          );
                     return Redirect()->route('posts.create')->with($notification);
                 }

            }else if($request->imagename2){
                $image_two=$request->imagename2;
                $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(290,360)->save('Image/Post/'.$image_two_name);
                $posts->imagename2 = $image_two_name;

                $data       =   array(
                    "name"    =>   $request->name,
                    
                );

                if($posts->save()){
                    $mail =  Mail::to('kamrulzamantonmoy@gmail.com')->send(new Updatemail($data));
                    $notification=array(
                        'messege'=>' Fornt Image   Insert !',
                        'alert-type'=>'sucess'
                         );
                    return Redirect()->route('posts.all')->with($notification);
                 }else{
                     $notification=array(
                         'messege'=>'Post Not Insert !',
                         'alert-type'=>'error'
                          );
                     return Redirect()->route('posts.create')->with($notification);
                 }

            }else{
                $data       =   array(
                    "name"    =>   $request->name,
                    
                );

                if($posts->save()){
                    $mail =  Mail::to('kamrulzamantonmoy@gmail.com')->send(new Updatemail($data));
                    $notification=array(
                        'messege'=>'Post  Insert !',
                        'alert-type'=>'sucess'
                         );
                    return Redirect()->route('posts.all')->with($notification);
                 }else{
                     $notification=array(
                         'messege'=>'Main image Not Insert !',
                         'alert-type'=>'error'
                          );
                     return Redirect()->route('posts.create')->with($notification);
                 }
                
            }


    }


    public function postsstatus(Request $request){
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['status'] == "Active"){
            $status = 0;
        }else{
            $status = 1;
        }

        Post::where('id',$data['section_id'])->update(['status'=>$status]);
        return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);

    }

    public function delete($id){

        if(is_null($this->admins) || !$this->admins->can('posts.delete')){
            abort(403,'Not Access');
        }

        $ids =  Crypt::decrypt($id);
        $posts = Post::findOrFail($ids);
        if(!is_null($posts)){
            $posts->delete();
        }

        
        $notification=array(
            'messege'=>'Posts Delete successfully!',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);
    }






}
