<?php

namespace App\Http\Controllers\Approve;

use App\Facilite;
use App\About;
use App\Achive;
use App\Banner;
use App\Category;
use App\Contact;
use App\Contactmsg;
use App\Faq;
use App\Faqparent;
use App\Http\Controllers\Controller;
use App\Jobplacement;
use App\Leader;
use App\Post;
use App\Seminar;
use App\Subcategory;
use App\Support;
use App\Addmissionproducer;
use App\Logo;
use App\Review;
use Illuminate\Contracts\Queue\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ApproveController extends Controller
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
    public function about()
    {

        if(is_null($this->admins) || !$this->admins->can('about.access')){
            abort(403,'Not Access');
        }
     
        $aboutapprove =    About::where('status',1)->orderBy('id', 'DESC')->get();
        return view('Admin.access.about',compact('aboutapprove'));
    } 


    public function aboutapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('about.updateaccess')){
            abort(403,'Not Access');
        }
        
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        About::where('id',$data['section_id'])->update(['approve'=>$approve, 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }


    public function achive()
    {

        if(is_null($this->admins) || !$this->admins->can('achive.access')){
            abort(403,'Not Access');
        }
    

        $achiveapprove =  Achive::where('status',1)->orderBy('id', 'DESC')->get();
       

       
        return view('Admin.access.achive',compact('achiveapprove'));
    } 


    public function achiveapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('achive.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Achive::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function banners()
    {

        if(is_null($this->admins) || !$this->admins->can('banners.access')){
            abort(403,'Not Access');
        }

        $bannerapprove =   Banner::where('status',1)->orderBy('id', 'DESC')->get();
      

    
      
        return view('Admin.access.banner',compact('bannerapprove'));
    } 


    public function bannersapprove(Request $request){

        
        if(is_null($this->admins) || !$this->admins->can('banners.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Banner::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function category()
    {

        if(is_null($this->admins) || !$this->admins->can('category.access')){
            abort(403,'Not Access');
        }

        $categoryapprove  =    Category::where('status',1)->orderBy('id', 'DESC')->get();
       
    
         
        return view('Admin.access.category',compact('categoryapprove'));
    } 


    public function categoryapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('category.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Category::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }


    public function subcategory()
    {
        if(is_null($this->admins) || !$this->admins->can('subcategory.access')){
            abort(403,'Not Access');
        }

        $subcategoryapprove  =   Subcategory::where('status',1)->orderBy('id', 'DESC')->get();
       
         
        return view('Admin.access.subcategory',compact('subcategoryapprove'));
    } 


    public function subcategoryapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('subcategory.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Subcategory::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function post()
    {

        if(is_null($this->admins) || !$this->admins->can('post.access')){
            abort(403,'Not Access');
        }
        $postapprove  =  Post::where('status',1)->orderBy('id', 'DESC')->get();
       


        return view('Admin.access.post',compact('postapprove'));
    } 


    public function postapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('post.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Post::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function facilities()
    {
    

        if(is_null($this->admins) || !$this->admins->can('facilities.access')){
            abort(403,'Not Access');
        }

        $facilitiesapprove  = Facilite::where('status',1)->orderBy('id', 'DESC')->get();
       
          
        return view('Admin.access.facilities',compact('facilitiesapprove'));
    } 


    public function facilitiesapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('facilities.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Facilite::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function faqparent()
    {

        if(is_null($this->admins) || !$this->admins->can('faqparent.access')){
            abort(403,'Not Access');
        }
        $faqparentapprove =  Faqparent::where('status',1)->orderBy('id', 'DESC')->get();
        
     
        return view('Admin.access.faqparent',compact('faqparentapprove'));
    } 


    public function faqparentapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('faqparent.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Faqparent::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function faqdetalies()
    {

        if(is_null($this->admins) || !$this->admins->can('faqdetalies.access')){
            abort(403,'Not Access');
        }

        $faqapprove =   Faq::where('status',1)->orderBy('id', 'DESC')->get();
       
     
    
        
        return view('Admin.access.faqdetalis',compact('faqapprove'));
    } 


    public function faqdetaliesapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('faqdetalies.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Faq::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }


    public function jobs()
    {

        if(is_null($this->admins) || !$this->admins->can('jobs.access')){
            abort(403,'Not Access');
        }
    

        
        $jobsapprove = Jobplacement::where('status',1)->orderBy('id', 'DESC')->get();
       
        
        return view('Admin.access.jobs',compact('jobsapprove'));
    } 


    public function jobsapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('jobs.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Jobplacement::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function leader()
    {


        if(is_null($this->admins) || !$this->admins->can('leader.access')){
            abort(403,'Not Access');
        }

        $leaderapprove =  Leader::where('status',1)->orderBy('id', 'DESC')->get();
       
        
        return view('Admin.access.leader',compact('leaderapprove'));
    } 


    public function leaderapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('leader.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Leader::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }


    
    public function seminer()
    {

        if(is_null($this->admins) || !$this->admins->can('seminer.access')){
            abort(403,'Not Access');
        }
    

        
        $seminerapprove =  Seminar::orderBy('id', 'DESC');
        
      
        return view('Admin.access.semenier',compact('seminerapprove'));
    } 


    public function seminerapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('seminer.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Seminar::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function contacts()
    {

        if(is_null($this->admins) || !$this->admins->can('contact.access')){
            abort(403,'Not Access');
        }

        $contactapprove =   Contactmsg::where('status',1)->orderBy('id', 'DESC')->get();
       
    
        
        return view('Admin.access.contactmsgapprove',compact('contactapprove'));
    } 


    public function contactapprove(Request $request){
        if(is_null($this->admins) || !$this->admins->can('contact.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Contactmsg::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function support()
    {


        if(is_null($this->admins) || !$this->admins->can('support.access')){
            abort(403,'Not Access');
        }
        $supportapprove =  Support::where('status',1)->orderBy('id', 'DESC')->get();
       
    
       
        return view('Admin.access.support',compact('supportapprove'));
    } 


    public function supportapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('support.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Support::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function producer()
    {

        if(is_null($this->admins) || !$this->admins->can('producer.access')){
            abort(403,'Not Access');
        }

        $producerapprove =   Addmissionproducer::where('status',1)->orderBy('id', 'DESC')->get();
       
    
       
        return view('Admin.access.admissionproducer',compact('producerapprove'));
    } 


    public function producerapprove(Request $request){

        
        if(is_null($this->admins) || !$this->admins->can('producer.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Addmissionproducer::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function reviews()
    {

        if(is_null($this->admins) || !$this->admins->can('reviews.access')){
            abort(403,'Not Access');
        }

        $reviewapprove =   Review::where('status',1)->orderBy('id', 'DESC')->get();
       
    
       
        return view('Admin.access.review',compact('reviewapprove'));
    } 


    public function reviewsapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('reviews.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Review::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }

    public function logos()
    {

        if(is_null($this->admins) || !$this->admins->can('logos.access')){
            abort(403,'Not Access');
        }

        $logosapprove =   Logo::where('status',1)->orderBy('id', 'DESC')->get();
       
        return view('Admin.access.logos',compact('logosapprove'));
    } 


    public function logosapprove(Request $request){

        if(is_null($this->admins) || !$this->admins->can('logos.updateaccess')){
            abort(403,'Not Access');
        }
        $data = $request->all();
        // echo "<pre>";print_r($data);
        if($data['approve'] == "Active"){
            $approve = 0;
        }else{
            $approve = 1;
        }

        Review::where('id',$data['section_id'])->update(['approve'=>$approve , 'count' => 0]);
        return response()->json(['approve'=>$approve,'section_id'=>$data['section_id']]);

    }
    
}
