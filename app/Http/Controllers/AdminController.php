<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Mail\Usermail;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use App\Jobs\Counsell\SendAdminEmailJob;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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

   


    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // if(is_null($this->admins) || !$this->admins->can('admin.dashboard')){
        //     abort(403,'Not Access');
        // }

        //  Artisan::call('optimize:clear');
         Artisan::call('cache:clear');


         $allDashboardCount =  DB::select( "SELECT 
               (SELECT COUNT(*) FROM posts WHERE status = 1 AND approve = 1) as post,
               (SELECT COUNT(*) FROM admins) as admin,
               (SELECT COUNT(*) FROM reviews WHERE status = 1 AND approve = 1) as review,
               (SELECT COUNT(*) FROM adforms WHERE status = 0 AND count = 1) as adform,
               (SELECT COUNT(*) FROM counsells WHERE mailsent = 0  AND count = 1 ) as counsell,
               (SELECT COUNT(*) FROM contacts WHERE status = 0  AND count = 0) as contact");

               $allDashboardCount = collect($allDashboardCount)->first();


         return view('admin', compact('allDashboardCount'));
    }

    public function profile()
    {
        return view('auth.Admin.profile');
    }
 
     public function profilechange()
    {
        $admindetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
        return view('auth.Admin.profilechange')->with(compact('admindetails'));
    }

    public function oldPassword(Request $request){
        $data = $request->all();
        // echo "<pre>" ; print_r($data); 
        // echo "<pre>" ; print_r( Auth::guard('admin')->user()->password); 
        if(Hash::check($data['old_password'],Auth::guard('admin')->user()->password)){
            echo "true";
        }else{
            echo "false";
        }
    }


    public function upadtepassword(Request $request){
         if($request->isMethod('post')){
             $data = $request->all();
            //Password Change
            //  print_r($data);

            $rules = [
                'name' => 'required',
                'email' => 'required',
            ];
            $customMessage = [
                'name.required' => 'Name Is Requerd',
                'email.required' => 'email Is Requerd',
            ];

                $this->validate($request,$rules,$customMessage);

            if(Hash::check($data['old_password'],Auth::guard('admin')->user()->password)){
                if($data['new_password'] == $data['confirm_pass']){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=> bcrypt($data['new_password']),'name'=> $data['name'],'email' =>$data['email']]);
                    return redirect()->route('admin.profile.change')->with('success','Your Password Has been Change!');
                }else{
                    return redirect()->route('admin.profile.change')->with('error','Your  Password Is Not Match!');
                }
            }else{
               return redirect()->route('admin.profile.change')->with('error','Your current Password Is Incorrect!');
            }
         }
    }

    // public function upadteprofile()
    // { $admindetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
    //     return view('auth.Admin.updateprofile')->with(compact('admindetails'));
    // }

    // public function upadteprofilestore(Request $request)
    // {
        

    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         $rules = [
    //             'name' => 'required',
    //             'email' => 'required',
    //         ];
    //         $customMessage = [
    //             'name.required' => 'Name Is Requerd',
    //             'email.required' => 'email Is Requerd',
    //         ];
    //             $this->validate($request,$rules,$customMessage);

    //             if(Hash::check($data['old_password'],Auth::guard('admin')->user()->password)){
    //                 Admin::where('email', Auth::guard('admin')->user()->email)->update(['name'=> $data['name'],'email' =>$data['email']]);
    //                 return redirect()->route('admin.profile.change')->with('success','Your current profile  has Been Change!');
    //             }else{
    //                 return redirect()->route('admin.update.profile.change')->with('error','Your current Password Is Incorrect!');
    //             }
    //     }
    // }


     public function alladmins()
    {
        if(is_null($this->admins) || !$this->admins->can('admins.all')){
            abort(403,'Not Access');
        }

        $admins =  Admin::orderBy('id', 'asc')->get();
       
    
        return view('Admin.users.index',compact('admins'));
    }

    public function usercreate()
    { 
        if(is_null($this->admins) || !$this->admins->can('admins.create')){
            abort(403,'Not Access');
        }

        $role =  Role::all();
        
        return view('Admin.users.create',compact('role'));
    }


    public function store(Request $request){


        
        if(is_null($this->admins) || !$this->admins->can('admins.store')){
            abort(403,'Not Access');
        }

        $rules = [
            'name' => 'required|max:100|unique:admins',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required',
        ];
        $customMessage = [
            'name.required' => 'Name Is Requerd',
            'email.required' => 'email Is Requerd',
            'password.required' => 'Password Is Requerd',
            'roles.required' => 'Role Is Requerd',
        ];

        $this->validate($request,$rules,$customMessage);

        $users = new Admin();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password =Hash::make( $request->password);
        $data       =   array(
            "name"    =>   $request->name,
        );
        if($request->cpassword == $request->password){
            if($request->roles ){
                $users->assignRole($request->roles);
                $users->save();

               
                Mail::to($request->email)->send(new Usermail($data)); //default mail j pataise
            }else{
                return redirect()->route('admins.create')->with('error','Role Not Defiend!');
            }
            //$users->save();
            // dd($user);
            return redirect()->route('admins.all')->with('success','User Create!');

        }else{
             return back();
        }


    }

    public function edit($id)
    {

        if(is_null($this->admins) || !$this->admins->can('admins.edit')){
            abort(403,'Not Access');
        }
        $admin = Admin::findOrFail($id);
        
        $role =   Role::all();
        
        return view('Admin.users.edit',compact('admin','role'));
    }

    public function message($id)
    {

        if(is_null($this->admins) || !$this->admins->can('admins.message')){
            abort(403,'Not Access');
        }
        $admin = Admin::findOrFail($id);
        
        
        return view('Admin.users.message',compact('admin'));
    }

    public function messageupdate(Request $request){
        if(is_null($this->admins) || !$this->admins->can('admins.messageUpdate')){
            abort(403,'Not Access');
        }
       
        $validatedData = $request->validate([
            'name' => 'required|',
            'email' => 'required|',
            'subject' =>  'required|',
            'message' =>  'required|',
            
        ]); 

       
       
       
            $data       =   array(
                "name"    =>   $request->name,
                "message"    =>   $request->message,
                "email"    =>   $request->email,
                "subject"    =>   $request->subject,
            );

            


            //Mail::to($toemail)->send(new Consellsendmail($data,$subject));

        $message =  dispatch(new SendAdminEmailJob($data));

        if($message) {
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'success'
                 );
               return Redirect()->route('admins.all')->with($notification);
        }else {
            $notification=array(
                'messege'=>'Mail successfully!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
        }

    }

    public function update(Request $request,$id){

        if(is_null($this->admins) || !$this->admins->can('admins.update')){
            abort(403,'Not Access');
        }

        $rules = [
            'name' => 'required|max:100',
            'email' => 'required|',
            
        ];
        $customMessage = [
            'name.required' => 'Name Is Requerd',
            'email.required' => 'email Is Requerd',
            'roles.required' => 'Role Is Requerd',
        ];

        $this->validate($request,$rules,$customMessage);

        $users =  Admin::findOrfail($id);
        $users->name = $request->name;
        $users->email = $request->email;

        
      
        $users->roles()->detach();

        if(empty($request->password && $request->cpassword)){
            if($request->roles ){
                $users->assignRole($request->roles);
                $users->save();
                return redirect()->route('admins.all')->with('error','Role Not Defiend!');
            }else{
                return redirect()->route('admins.create')->with('error','Role Not Defiend!');
            }

            return redirect()->route('admins.all')->with('success','User Create!');
              
        }else{
            if($request->cpassword == $request->password){
                if($request->roles ){
                    $users->assignRole($request->roles);
                    $users->save();
                }else{
                    return redirect()->route('admins.create')->with('error','Role Not Defiend!');
                }
                //$users->save();
                // dd($user);
                return redirect()->route('admins.all')->with('success','User Create!');
    
            }else{
                return redirect()->route('admins.edit')->with('error','User Create!');
            }

        }
        


    }


    public function delete($id)
    {

        if(is_null($this->admins) || !$this->admins->can('admins.delete')){
            abort(403,'Not Access');
        }

        $admins =  Admin::findOrfail($id); 
        if(!is_null($admins)){
            $admins->delete();
        }

        return redirect()->route('admins.all')->with('success','User Has delete!');
    }




}
