<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
   return view('home');
})->name('index');

Auth::routes();


Route::get('/clear-cache', function() {
   Artisan::call('optimize:clear');
   Artisan::call('cache:clear');
   return redirect()->route('index');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userlogout')->name('user.logout');

// Profile...
Route::get('/profile', 'HomeController@profile')->name('user.profile');
Route::get('/profile/change', 'HomeController@profilechange')->name('user.profile.change');

 // Profile Edit...
Route::Post('/update-password', 'HomeController@useroldPassword');
Route::Post('/update-profile-password', 'HomeController@upadtepassword');
Route::get('/update-profile-change', 'HomeController@upadteprofile')->name('user.update.profile.change');
Route::post('/update-profile-change-store', 'HomeController@upadteprofilestore')->name('user.update.profile.store');
Route::post('/create/counsell', 'FrontendController@counsellstore')->name('counsell.allstore');
Route::get('/addmissionForm', 'FrontendController@index')->name('Adform.all');
Route::get('/subcat/{category_id}', 'FrontendController@subcat');
Route::post('/create/addform', 'FrontendController@store')->name('Adform.allstore');
Route::get('/contact', 'FrontendController@contactindex')->name('contacts.all');
Route::post('/create/contact', 'FrontendController@contactstore')->name('contact.allstore');

   //Frontend Section.
Route::get('/about-us', 'FrontendController@about')->name('home.about');
Route::get('/Addmission-producer', 'FrontendController@producer')->name('home.producer');
Route::get('/job-Placement', 'FrontendController@placement')->name('home.placement');
Route::get('/facilites', 'FrontendController@facilites')->name('home.facilites');
Route::get('/semeniar', 'FrontendController@semeniar')->name('home.semeniar');
Route::get('/reviews', 'FrontendController@reviews')->name('home.reviews');
Route::get('/courseDetalis/{slug}', 'FrontendController@courseDetalis')->name('home.courseDetalis');
Route::get('/faq', 'FrontendController@faq')->name('home.faq');
Route::get('/allCourse', 'FrontendController@allcourse')->name('home.allcourse');
Route::get('/support', 'FrontendController@support')->name('home.support');




Route::group(['prefix' => 'admin'], function() {

         //Admin Login...
        Route::get('/', 'AdminController@index')->name('admin.dashboard')->middleware('auth:admin');
        Route::get('/login', 'Auth\AdminLoginController@showLoginFrom')->name('admin.login')->middleware('guest:admin');
        Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit')->middleware('guest:admin');
        Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

        //Admin Register...

        Route::get('/register', function () {

           abort(404);

        //Route::get('/register', 'Auth\AdminRegisterController@showRegisterFrom')->name('admin.register')->middleware('guest:admin');
        //Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.store')->middleware('guest:admin');

            
        });


        

        //Admin Profile...
        Route::get('/profile', 'AdminController@profile')->name('admin.profile')->middleware('auth:admin');
        Route::get('/profile/change', 'AdminController@profilechange')->name('admin.profile.change')->middleware('auth:admin');

        //Admin Profile Edit...
        //Ajax Start
        Route::Post('/update-password', 'AdminController@oldPassword')->middleware('auth:admin');
        //ajax End

        Route::Post('/update-profile-password', 'AdminController@upadtepassword')->middleware('auth:admin');

         Route::get('update-profile-change', function () {

           abort(404);

            // Route::get('/update-profile-change', 'AdminController@upadteprofile')->name('admin.update.profile.change')->middleware('auth:admin');
            // Route::post('/update-profile-change-store', 'AdminController@upadteprofilestore')->name('admin.update.profile.store')->middleware('auth:admin');


          });  

       
        //Admin Reset Password Edit...

        Route::get('/password/reset', function () {

           abort(404);

            // Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request ');
            // Route::post('/password/reset','Auth\AdminResetPasswordController@reset')->name('admin.password.update');
            // Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

          });

        Route::get('/password/email', function () {

           abort(404);

           // Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email')->middleware('guest:admin');

          });


    

         //All Admin ...

        Route::get('/alladmins', 'AdminController@alladmins')->name('admins.all')->middleware('auth:admin');
        Route::get('/users/create', 'AdminController@usercreate')->name('admins.create')->middleware('auth:admin');
        Route::Post('/users/create/', 'AdminController@store')->name('admins.store')->middleware('auth:admin');

         //Admin Edit System ...

        Route::get('/users/edit/{id}', 'AdminController@edit')->name('admins.edit ')->middleware('auth:admin');
        Route::get('/users/message/{id}', 'AdminController@message')->name('admins.message ')->middleware('auth:admin');
        Route::post('/users/message/', 'AdminController@messageupdate')->name('admins.messageUpdate')->middleware('auth:admin');
        Route::Post('/users/edit/{id}', 'AdminController@update')->name('admins.update ')->middleware('auth:admin');
        Route::post('/users/delete/{id}', 'AdminController@delete')->name('admin.delete ')->middleware('auth:admin');

         //Role System

        Route::get('/allroles', 'RoleController@index')->name('role.all')->middleware('auth:admin');
        Route::get('/create/roles', 'RoleController@create')->name('role.create')->middleware('auth:admin');
        Route::post('/create/roles', 'RoleController@store')->name('role.store')->middleware('auth:admin');

           //Role Edit System

        Route::get('/roles/edit/{id}', 'RoleController@edit')->name('role.edit ')->middleware('auth:admin');
        Route::post('/roles/edit/{id}', 'RoleController@update')->name('role.update ')->middleware('auth:admin');
        Route::post('/roles/delete/{id}', 'RoleController@delete')->name('role.delete ')->middleware('auth:admin');
         

          //Banner System

         Route::get('/allbanners', 'Banner\BannerController@index')->name('banners.all')->middleware('auth:admin');
         Route::get('/create/banners', 'Banner\BannerController@create')->name('banners.create')->middleware('auth:admin');
         Route::post('/create/banners', 'Banner\BannerController@store')->name('banners.allstore');
  
         //Banner Edit System
  
         Route::get('/banners/view/{id}', 'Banner\BannerController@view')->name('banners.view ')->middleware('auth:admin');
         Route::get('/banners/edit/{id}', 'Banner\BannerController@edit')->name('banners.edit ')->middleware('auth:admin');
         Route::post('/banners/edit/{id}', 'Banner\BannerController@update')->name('banners.update ')->middleware('auth:admin');
         Route::delete('/banners/delete/{id}', 'Banner\BannerController@delete')->name('banners.delete ')->middleware('auth:admin');
         Route::Post('/bannerupdatestatus', 'Banner\BannerController@bannerstatus');


         //Logo System

         Route::get('/alllogos', 'Logo\LogoController@index')->name('logos.all')->middleware('auth:admin');
         Route::get('/create/logos', 'Logo\LogoController@create')->name('logos.create')->middleware('auth:admin');
         Route::post('/create/logos', 'Logo\LogoController@store')->name('logos.allstore');
  
         //Logo Edit System
         Route::get('/logos/edit/{id}', 'Logo\LogoController@edit')->name('logos.edit ')->middleware('auth:admin');
         Route::post('/logos/edit/{id}', 'Logo\LogoController@update')->name('logos.update ')->middleware('auth:admin');
         Route::delete('/logos/delete/{id}', 'Logo\LogoController@delete')->name('logos.delete ')->middleware('auth:admin');
         Route::Post('/logosupdatestatus', 'Logo\LogoController@logosstatus');



         //Achievement System

         Route::get('/allachivement', 'Achive\AchiveController@index')->name('Achive.all')->middleware('auth:admin');
         Route::get('/create/achivement', 'Achive\AchiveController@create')->name('Achive.create')->middleware('auth:admin');
         Route::post('/create/achivement', 'Achive\AchiveController@store')->name('Achive.allstore');
   
         //Achievement Edit System
   
         Route::get('/achivement/view/{id}', 'Achive\AchiveController@view')->name('Achive.view ')->middleware('auth:admin');
         Route::get('/achivement/edit/{id}', 'Achive\AchiveController@edit')->name('Achive.edit ')->middleware('auth:admin');
         Route::post('/achivement/edit/{id}', 'Achive\AchiveController@update')->name('Achive.update ')->middleware('auth:admin');
         Route::delete('/achivement/delete/{id}', 'Achive\AchiveController@delete')->name('Achive.delete ')->middleware('auth:admin');
         Route::Post('/achivementupdatestatus', 'Achive\AchiveController@Achivestatus');

         
         //Categories System

         Route::get('/allcategories', 'Category\CategoryController@index')->name('categories.all')->middleware('auth:admin');
         Route::get('/create/categories', 'Category\CategoryController@create')->name('categories.create')->middleware('auth:admin');
         Route::post('/create/categories', 'Category\CategoryController@store')->name('categories.allstore');
   
         //Categories Edit System
   
         Route::get('/categories/edit/{id}', 'Category\CategoryController@edit')->name('categories.edit ')->middleware('auth:admin');
         Route::post('/categories/edit/{id}', 'Category\CategoryController@update')->name('categories.update ')->middleware('auth:admin');
         Route::post('/categories/delete/{id}', 'Category\CategoryController@delete')->name('categories.delete ')->middleware('auth:admin');
         Route::Post('/categories', 'Category\CategoryController@categoriesstatus');

           
         //SubCategories System

         Route::get('/allsubcategories', 'SubCategory\SubCategoryController@index')->name('subcategories.all')->middleware('auth:admin');
         Route::get('/create/subcategories', 'SubCategory\SubCategoryController@create')->name('subcategories.create')->middleware('auth:admin');
         Route::post('/create/subcategories', 'SubCategory\SubCategoryController@store')->name('subcategories.allstore');
   
         //SubCategories Edit System
   
         Route::get('/subcategories/edit/{id}', 'SubCategory\SubCategoryController@edit')->name('subcategories.edit ')->middleware('auth:admin');
         Route::post('/subcategories/edit/{id}', 'SubCategory\SubCategoryController@update')->name('subcategories.update ')->middleware('auth:admin');
         Route::post('/subcategories/delete/{id}', 'SubCategory\SubCategoryController@delete')->name('subcategories.delete ')->middleware('auth:admin');
         Route::Post('/subcategories', 'SubCategory\SubCategoryController@subcategoriesstatus');


          //Post System

          Route::get('/allposts', 'Post\PostController@index')->name('posts.all')->middleware('auth:admin');
          Route::get('/create/posts', 'Post\PostController@create')->name('posts.create')->middleware('auth:admin');
          Route::post('/create/posts', 'Post\PostController@store')->name('posts.allstore');
          Route::get('/subcat/{category_id}', 'Post\PostController@subcat');
    
          //Post View Edit System
          Route::get('/posts/view/{id}', 'Post\PostController@view')->name('posts.view ')->middleware('auth:admin');
          Route::get('/posts/edit/{id}', 'Post\PostController@edit')->name('posts.edit ')->middleware('auth:admin');
          Route::post('/posts/edit/{id}', 'Post\PostController@update')->name('posts.update ')->middleware('auth:admin');
          Route::post('/posts/delete/{id}', 'Post\PostController@delete')->name('posts.delete ')->middleware('auth:admin');
          Route::Post('/posts', 'Post\PostController@postsstatus');

         //Counselling System

         Route::get('/allCounsell', 'Counselly\CounsellyController@index')->name('counsell.all')->middleware('auth:admin');
        
     
         //Counselling Edit & Delete System
         Route::get('/counsell/edit/{id}', 'Counselly\CounsellyController@edit')->name('counsell.edit ')->middleware('auth:admin');
         Route::post('/counsell/edit/{id}', 'Counselly\CounsellyController@update')->name('counsell.update ')->middleware('auth:admin');
         Route::post('/counsell/delete/{id}', 'Counselly\CounsellyController@delete')->name('counsell.delete ')->middleware('auth:admin');
         Route::Post('/counsell', 'Counselly\CounsellyController@counsellstatus');


         
         //Facilites System

         Route::get('/allfacilites', 'Facilities\FacilitiesController@index')->name('facilities.all')->middleware('auth:admin');
         Route::get('/create/facilities', 'Facilities\FacilitiesController@create')->name('facilities.create')->middleware('auth:admin');
         Route::post('/create/facilities', 'Facilities\FacilitiesController@store')->name('facilities.allstore');
    
         //Facilites Edit System
         Route::get('/facilities/view/{id}', 'Facilities\FacilitiesController@view')->name('facilities.view ')->middleware('auth:admin');
         Route::get('/facilities/edit/{id}', 'Facilities\FacilitiesController@edit')->name('facilities.edit ')->middleware('auth:admin');
         Route::post('/facilities/edit/{id}', 'Facilities\FacilitiesController@update')->name('facilities.update ')->middleware('auth:admin');
         Route::post('/facilities/delete/{id}', 'Facilities\FacilitiesController@delete')->name('facilities.delete ')->middleware('auth:admin');
         Route::Post('/facilities', 'Facilities\FacilitiesController@facilitiesstatus');
     
          
         //Leader System

         Route::get('/allleader', 'Leader\LeaderController@index')->name('leaders.all')->middleware('auth:admin');
         Route::get('/create/leaders', 'Leader\LeaderController@create')->name('leaders.create')->middleware('auth:admin');
         Route::post('/create/leaders', 'Leader\LeaderController@store')->name('leaders.allstore');
    
         //Leader Edit System
   
         Route::get('/leaders/edit/{id}', 'Leader\LeaderController@edit')->name('leaders.edit ')->middleware('auth:admin');
         Route::get('/leaders/view/{id}', 'Leader\LeaderController@view')->name('leaders.view ')->middleware('auth:admin');
         Route::post('/leaders/edit/{id}', 'Leader\LeaderController@update')->name('leaders.update ')->middleware('auth:admin');
         Route::post('/leaders/delete/{id}', 'Leader\LeaderController@delete')->name('leaders.delete ')->middleware('auth:admin');
         Route::Post('/leaders', 'Leader\LeaderController@leadersstatus');

         //About System

         Route::get('/allabouts', 'About\AboutController@index')->name('abouts.all')->middleware('auth:admin');
         Route::get('/create/abouts', 'About\AboutController@create')->name('abouts.create')->middleware('auth:admin');
         Route::post('/create/abouts', 'About\AboutController@store')->name('abouts.allstore')->middleware('auth:admin');
   
         //About Edit System
         Route::get('/abouts/view/{id}', 'About\AboutController@view')->name('abouts.view ')->middleware('auth:admin');
         Route::get('/abouts/edit/{id}', 'About\AboutController@edit')->name('abouts.edit ')->middleware('auth:admin');
         Route::post('/abouts/edit/{id}', 'About\AboutController@update')->name('abouts.update ')->middleware('auth:admin');
         Route::post('/abouts/delete/{id}', 'About\AboutController@delete')->name('abouts.delete ')->middleware('auth:admin');
         Route::Post('/abouts', 'About\AboutController@aboutssstatus');

         //AddmissionProducer System

         Route::get('/alladdmissionproducers', 'Admissionproducer\AddmissionproducerController@index')->name('addmissionproducers.all')->middleware('auth:admin');
         Route::get('/create/addmissionproducers', 'Admissionproducer\AddmissionproducerController@create')->name('addmissionproducers.create')->middleware('auth:admin');
         Route::post('/create/addmissionproducers', 'Admissionproducer\AddmissionproducerController@store')->name('addmissionproducers.allstore');
   
         //AddmissionProducer Edit System
         Route::get('/addmissionproducers/view/{id}', 'Admissionproducer\AddmissionproducerController@view')->name('addmissionproducers.edit ')->middleware('auth:admin');
         Route::get('/addmissionproducers/edit/{id}', 'Admissionproducer\AddmissionproducerController@edit')->name('addmissionproducers.edit ')->middleware('auth:admin');
         Route::post('/addmissionproducers/edit/{id}', 'Admissionproducer\AddmissionproducerController@update')->name('addmissionproducers.update ')->middleware('auth:admin');
         Route::post('/addmissionproducers/delete/{id}', 'Admissionproducer\AddmissionproducerController@delete')->name('addmissionproducers.delete ')->middleware('auth:admin');
         Route::Post('/addmissionproducers', 'Admissionproducer\AddmissionproducerController@addmissionproducerssstatus');

         //Addmission System

         Route::get('/alladdmission', 'Addmission\AddformController@index')->name('addmission.all')->middleware('auth:admin');
         Route::get('/addmission/view/{id}', 'Addmission\AddformController@view')->name('addmission.view')->middleware('auth:admin');
        
     
         //Addmission Edit & Delete System
         Route::get('/addmission/edit/{id}', 'Addmission\AddformController@edit')->name('addmission.edit ')->middleware('auth:admin');
         Route::post('/addmission/edit/{id}', 'Addmission\AddformController@update')->name('addmission.update ')->middleware('auth:admin');
         Route::post('/addmission/delete/{id}', 'Addmission\AddformController@delete')->name('addmission.delete ')->middleware('auth:admin');

         //jobplacement System

         Route::get('/alljobplacement', 'Jobplacement\JobplacementController@index')->name('jobplacement.all')->middleware('auth:admin');
         Route::post('/create/jobplacement', 'Jobplacement\JobplacementController@store')->name('jobplacement.allstore');
         Route::get('/jobplacement/view/{id}', 'Jobplacement\JobplacementController@view')->name('jobplacement.view')->middleware('auth:admin');
            
         
         //jobplacement Edit & Delete System
         Route::get('/jobplacement/edit/{id}', 'Jobplacement\JobplacementController@edit')->name('jobplacement.edit ')->middleware('auth:admin');
         Route::post('/jobplacement/edit/{id}', 'Jobplacement\JobplacementController@update')->name('jobplacement.update ')->middleware('auth:admin');
         Route::post('/jobplacement/delete/{id}', 'Jobplacement\JobplacementController@delete')->name('jobplacement.delete ')->middleware('auth:admin');
         Route::Post('/jobplacements', 'Jobplacement\JobplacementController@jobssstatus');



          //Support System

          Route::get('/allsupport', 'Support\SupportController@index')->name('support.all')->middleware('auth:admin');
          Route::post('/create/support', 'Support\SupportController@store')->name('support.allstore');
          Route::get('/support/view/{id}', 'Support\SupportController@view')->name('support.view')->middleware('auth:admin');
             
          
          //Support Edit & Delete System
          Route::get('/support/edit/{id}', 'Support\SupportController@edit')->name('support.edit ')->middleware('auth:admin');
          Route::post('/support/edit/{id}', 'Support\SupportController@update')->name('support.update ')->middleware('auth:admin');
          Route::post('/support/delete/{id}', 'Support\SupportController@delete')->name('support.delete ')->middleware('auth:admin');
          Route::Post('/support', 'Support\SupportController@supportstatus');
 


         //Faq Parent System

         Route::get('/allfaqparents', 'Faq\FaqparentController@index')->name('faqparents.all')->middleware('auth:admin');
         Route::get('/create/faqparents', 'Faq\FaqparentController@create')->name('faqparents.create')->middleware('auth:admin');
         Route::post('/create/faqparents', 'Faq\FaqparentController@store')->name('faqparents.allstore');
   
         //Faq Parent Edit SystemFaq
         Route::get('/faqparents/view/{id}', 'Faq\FaqparentController@view')->name('faqparents.view ')->middleware('auth:admin');
         Route::get('/faqparents/edit/{id}', 'Faq\FaqparentController@edit')->name('faqparents.edit ')->middleware('auth:admin');
         Route::post('/faqparents/edit/{id}', 'Faq\FaqparentController@update')->name('faqparents.update ')->middleware('auth:admin');
         Route::post('/faqparents/delete/{id}', 'Faq\FaqparentController@delete')->name('faqparents.delete ')->middleware('auth:admin');
         Route::Post('/faqparents', 'Faq\FaqparentController@faqparentssstatus');


          //Faq System

          Route::get('/allfaq', 'Faq\FaqController@index')->name('faqs.all')->middleware('auth:admin');
          Route::post('/create/faqs', 'Faq\FaqController@store')->name('faqs.allstore');
          Route::get('/faqs/view/{id}', 'Faq\FaqController@view')->name('faqs.view')->middleware('auth:admin');
             
          
          //Faq Edit & Delete System
          Route::get('/faqs/edit/{id}', 'Faq\FaqController@edit')->name('faqs.edit ')->middleware('auth:admin');
          Route::post('/faqs/edit/{id}', 'Faq\FaqController@update')->name('faqs.update ')->middleware('auth:admin');
          Route::post('/faqs/delete/{id}', 'Faq\FaqController@delete')->name('faqs.delete ')->middleware('auth:admin');
          Route::Post('/faqs', 'Faq\FaqController@faqssstatus');

           //Seminer System

          Route::get('/allseminers', 'Seminar\SeminarController@index')->name('seminars.all')->middleware('auth:admin');
          Route::post('/create/seminars', 'Seminar\SeminarController@store')->name('seminars.allstore');
          Route::get('/seminars/view/{id}', 'Seminar\SeminarController@view')->name('seminars.view')->middleware('auth:admin');
             
          
          //Seminer Edit & Delete System
          Route::get('/seminars/edit/{id}', 'Seminar\SeminarController@edit')->name('seminars.edit ')->middleware('auth:admin');
          Route::post('/seminars/edit/{id}', 'Seminar\SeminarController@update')->name('seminars.update ')->middleware('auth:admin');
          Route::post('/seminars/delete/{id}', 'Seminar\SeminarController@delete')->name('seminars.delete ')->middleware('auth:admin');
          Route::Post('/seminars', 'Seminar\SeminarController@faqssstatus');


         //Review Systemreviews

         Route::get('/allreviews', 'Review\ReviewController@index')->name('reviews.all')->middleware('auth:admin');
         Route::post('/create/reviews', 'Review\ReviewController@store')->name('reviews.allstore');
         Route::get('/reviews/view/{id}', 'Review\ReviewController@view')->name('reviews.view')->middleware('auth:admin');
            
         
         //Review Edit & Delete SystemReview
         Route::get('/reviews/edit/{id}', 'Review\ReviewController@edit')->name('reviews.edit ')->middleware('auth:admin');
         Route::post('/reviews/edit/{id}', 'Review\ReviewController@update')->name('reviews.update ')->middleware('auth:admin');
         Route::post('/reviews/delete/{id}', 'Review\ReviewController@delete')->name('reviews.delete ')->middleware('auth:admin');
         Route::Post('/reviews', 'Review\ReviewController@reviewsstatus');


          //Contact System

         Route::get('/allcontact', 'Contact\ContactController@index')->name('contact.all')->middleware('auth:admin');
         Route::get('/contact/view/{id}', 'Contact\ContactController@view')->name('contact.view')->middleware('auth:admin');
        
     
         //Addmission Edit & Delete System
         Route::get('/contact/edit/{id}', 'Contact\ContactController@edit')->name('contact.edit ')->middleware('auth:admin');
         Route::post('/contact/edit/{id}', 'Contact\ContactController@update')->name('contact.update ')->middleware('auth:admin');
         Route::post('/contact/delete/{id}', 'Contact\ContactController@delete')->name('contact.delete ')->middleware('auth:admin');


         //Contact Detalis System

         Route::get('/allcontactdetalis', 'Contact\ContactmsgController@index')->name('contactdetalis.all')->middleware('auth:admin');
         Route::get('/create/contactdetalis', 'Contact\ContactmsgController@create')->name('contactdetalis.create')->middleware('auth:admin');
         Route::post('/create/contactdetalis', 'Contact\ContactmsgController@store')->name('contactdetalis.allstore');
   
         //Faq Parent Edit SystemFaq
         Route::get('/contactdetalis/view/{id}', 'Contact\ContactmsgController@view')->name('contactdetalis.view ')->middleware('auth:admin');
         Route::get('/contactdetalis/edit/{id}', 'Contact\ContactmsgController@edit')->name('contactdetalis.edit ')->middleware('auth:admin');
         Route::post('/contactdetalis/edit/{id}', 'Contact\ContactmsgController@update')->name('contactdetalis.update ')->middleware('auth:admin');
         Route::post('/contactdetalis/delete/{id}', 'Contact\ContactmsgController@delete')->name('contactdetalis.delete ')->middleware('auth:admin');
         Route::Post('/contactdetalis', 'Contact\ContactmsgController@contactdetalisstatus');




         //Admin Approvie Access
         Route::get('/approveabout', 'Approve\ApproveController@about')->name('about.access')->middleware('auth:admin');  
         Route::Post('/approveabout', 'Approve\ApproveController@aboutapprove')->name('about.updateaccess')->middleware('auth:admin');  

         Route::get('/approveachive', 'Approve\ApproveController@achive')->name('achive.access')->middleware('auth:admin');  
         Route::Post('/approveachive', 'Approve\ApproveController@achiveapprove')->name('achive.updateaccess')->middleware('auth:admin');  

         Route::get('/approvebanners', 'Approve\ApproveController@banners')->name('banners.access')->middleware('auth:admin');  
         Route::Post('/approvebannerse', 'Approve\ApproveController@bannersapprove')->name('banners.updateaccess')->middleware('auth:admin');  

         Route::get('/approvecategory', 'Approve\ApproveController@category')->name('category.access')->middleware('auth:admin');  
         Route::Post('/approvecategory', 'Approve\ApproveController@categoryapprove')->name('category.updateaccess')->middleware('auth:admin');  

         Route::get('/approvesubcategory', 'Approve\ApproveController@subcategory')->name('subcategory.access')->middleware('auth:admin');  
         Route::Post('/approvesubcategory', 'Approve\ApproveController@subcategoryapprove')->name('subcategory.updateaccess')->middleware('auth:admin');  

         Route::get('/approvepost', 'Approve\ApproveController@post')->name('post.access')->middleware('auth:admin');  
         Route::Post('/approvepost', 'Approve\ApproveController@postapprove')->name('post.updateaccess')->middleware('auth:admin');  

         Route::get('/approvefacilities', 'Approve\ApproveController@facilities')->name('facilities.access')->middleware('auth:admin');  
         Route::Post('/approvefacilities', 'Approve\ApproveController@facilitiesapprove')->name('facilities.updateaccess')->middleware('auth:admin'); 
         
         Route::get('/approvefaqparent', 'Approve\ApproveController@faqparent')->name('faqparent.access')->middleware('auth:admin');  
         Route::Post('/approvefaqparent', 'Approve\ApproveController@faqparentapprove')->name('faqparent.updateaccess')->middleware('auth:admin'); 

         Route::get('/approvefaqdetalies', 'Approve\ApproveController@faqdetalies')->name('faqdetalies.access')->middleware('auth:admin');  
         Route::Post('/approvefaqdetalies', 'Approve\ApproveController@faqdetaliesapprove')->name('faqdetalies.updateaccess')->middleware('auth:admin');  

         Route::get('/approveleader', 'Approve\ApproveController@leader')->name('leader.access')->middleware('auth:admin');  
         Route::Post('/approveleader', 'Approve\ApproveController@leaderapprove')->name('leader.updateaccess')->middleware('auth:admin'); 
         
         Route::get('/approveseminer', 'Approve\ApproveController@seminer')->name('seminer.access')->middleware('auth:admin');  
         Route::Post('/approveseminer', 'Approve\ApproveController@seminerapprove')->name('seminer.updateaccess')->middleware('auth:admin');

         Route::get('/approvejob', 'Approve\ApproveController@jobs')->name('jobs.access')->middleware('auth:admin');  
         Route::Post('/approvejob', 'Approve\ApproveController@jobsapprove')->name('jobs.updateaccess')->middleware('auth:admin');

         Route::get('/approvecontact', 'Approve\ApproveController@contacts')->name('contact.access')->middleware('auth:admin');  
         Route::Post('/approvecontact', 'Approve\ApproveController@contactapprove')->name('contact.updateaccess')->middleware('auth:admin');


         Route::get('/approvesupport', 'Approve\ApproveController@support')->name('support.access')->middleware('auth:admin');  
         Route::Post('/approvesupport', 'Approve\ApproveController@supportapprove')->name('support.updateaccess')->middleware('auth:admin');

         Route::get('/approveproducer', 'Approve\ApproveController@producer')->name('producer.access')->middleware('auth:admin');  
         Route::Post('/approveproducer', 'Approve\ApproveController@producerapprove')->name('producer.updateaccess')->middleware('auth:admin');

         Route::get('/approvereviews', 'Approve\ApproveController@reviews')->name('reviews.access')->middleware('auth:admin');  
         Route::Post('/approvereviews', 'Approve\ApproveController@reviewsapprove')->name('reviews.updateaccess')->middleware('auth:admin');

         Route::get('/approvelogos', 'Approve\ApproveController@logos')->name('logos.access')->middleware('auth:admin');  
         Route::Post('/approvelogos', 'Approve\ApproveController@logosapprove')->name('logos.updateaccess')->middleware('auth:admin');



        
    


});





