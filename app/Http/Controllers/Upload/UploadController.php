<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    // public function index()
    // {
    //     return view('Admin.banner.index');
    // }

    // public function create()
    // {
        
    //     return view('Admin.banner.create');
    // }

    // public function allstore(Request $request)
    // {
        // $validatedData = $request->validate([
        //     'name' => 'required|',
        //     'slug' => 'required|',
        //     'imagename' => 'required'
            
        // ]); 

            // $data=array();
            // $data['name']=$request->name;
            // $data['slug']=$request->slug;
            // $image_one=$request->image_one;
            // $imagename= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
            // Image::make($image_one)->resize(230,300)->save('public/Banners'.$image_one);
            // $data['image_one']='public/media/product/'.$imagename;

            // print_r($data);


        // $notification=array(
        //     'messege'=>'Banner Insert successfully!',
        //     'alert-type'=>'success'
        //      );
        //    return Redirect()->back()->with($notification);
        



    // }
}
