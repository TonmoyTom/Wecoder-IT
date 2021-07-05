<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //role  

         $rolesuperadmin = Role::create(['guard_name' => 'admin','name' => 'superadmin']);
         $roleadmin = Role::create(['guard_name' => 'admin','name' => 'admin']);
         $roleeditor = Role::create(['guard_name' => 'admin','name' => 'editor']);
         $roleuser = Role::create(['guard_name' => 'admin','name' => 'user']);
        //permission

        $permissions = [

            
            [
                'group_name' => 'admin',
                'permissions' => [
                    // admin Permissions
                    'admins.all',
                    'admins.create',
                    'admins.store',
                    'admins.edit',
                    'admins.message',
                    'admins.messageUpdate',
                    'admins.update',
                    'admins.delete',
                    
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    // role Permissions
                    'role.all',
                    'role.create',
                    'role.store',
                    'role.edit',
                    'role.update',
                    'role.delete',
                ]
            ],
            [
                'group_name' => 'banner',
                'permissions' => [
                    // role Permissions
                    'banners.all',
                    'banners.create',
                    'banners.allstore',
                    'banners.view',
                    'banners.edit',
                    'banners.update',
                    'banners.delete',
                ]
            ],
            [
                'group_name' => 'logo',
                'permissions' => [
                    // role Permissions
                    'logos.all',
                    'logos.create',
                    'logos.allstore',
                    'logos.edit',
                    'logos.update',
                    'logos.delete',
                ]
            ],
            [
                'group_name' => 'Achive',
                'permissions' => [
                    // role Permissions
                    'Achive.all',
                    'Achive.create',
                    'Achive.allstore',
                    'Achive.view',
                    'Achive.edit',
                    'Achive.update',
                    'Achive.delete',
                ]
            ],
            [
                'group_name' => 'Category',
                'permissions' => [
                    // role Permissions
                    'categories.all',
                    'categories.create',
                    'categories.allstore',
                    'categories.edit',
                    'categories.update',
                    'categories.delete',
                ]
            ],

            [
                'group_name' => 'subcategoy',
                'permissions' => [
                    // role Permissions
                    'subcategories.all',
                    'subcategories.create',
                    'subcategories.allstore',
                    'subcategories.edit',
                    'subcategories.update',
                    'subcategories.delete',
                ]
            ],
            [
                'group_name' => 'Posts',
                'permissions' => [
                    // role Permissions
                    'posts.all',
                    'posts.create',
                    'posts.allstore',
                    'posts.view',
                    'posts.edit',
                    'posts.update',
                    'posts.delete',
                ]  
            ],
            [
                'group_name' => 'counsell',
                'permissions' => [
                    // role Permissions
                    'counsell.all',
                    'counsell.edit',
                    'counsell.update',
                    'counsell.delete',
                ]
            ],
            [
                'group_name' => 'facilities',
                'permissions' => [
                    // role Permissions
                    'facilities.all',
                    'facilities.create',
                    'facilities.allstore',
                    'facilities.view',
                    'facilities.edit',
                    'facilities.update',
                    'facilities.delete',
                ]
            ],

            [
                'group_name' => 'leaders',
                'permissions' => [
                    // role Permissions
                    'leaders.all',
                    'leaders.create',
                    'leaders.allstore',
                    'leaders.view',
                    'leaders.edit',
                    'leaders.update',
                    'leaders.delete',
                ]
            ],
            [
                'group_name' => 'abouts',
                'permissions' => [
                    // role Permissions
                    'abouts.all',
                    'abouts.create',
                    'abouts.allstore',
                    'abouts.view',
                    'abouts.edit',
                    'abouts.update',
                    'abouts.delete',
                ]
            ],
            [
                'group_name' =>'Producers',
                'permissions' => [
                    // role Permissions
                    'addmissionproducers.all',
                    'addmissionproducers.create',
                    'addmissionproducers.allstore',
                    'addmissionproducers.view',
                    'addmissionproducers.edit',
                    'addmissionproducers.update',
                    'addmissionproducers.delete',
                ]
            ],
            [
                'group_name' => 'addmission',
                'permissions' => [
                    // role Permissions
                    'addmission.all',
                    'addmission.view',
                    'addmission.edit',
                    'addmission.update',
                    'addmission.delete',
                ]
            ],
             [
                'group_name' => 'jobplacement',
                'permissions' => [
                    // role Permissions
                    'jobplacement.all',
                    'jobplacement.create',
                    'jobplacement.allstore',
                    'jobplacement.view',
                    'jobplacement.edit',
                    'jobplacement.update',
                    'jobplacement.delete',
                ]
            ],
            [
                'group_name' => 'support',
                'permissions' => [
                    // role Permissions
                    'support.all',
                    'support.create',
                    'support.allstore',
                    'support.view',
                    'support.edit',
                    'support.update',
                    'support.delete',
                ]
            ],
            [
                'group_name' => 'faqparents',
                'permissions' => [
                    // role Permissions
                    'faqparents.all',
                    'faqparents.create',
                    'faqparents.view',
                    'faqparents.allstore',
                    'faqparents.edit',
                    'faqparents.update',
                    'faqparents.delete',
                ]
            ],
            [
                'group_name' => 'faqs',
                'permissions' => [
                    // role Permissions
                    'faqs.all',
                    'faqs.create',
                    'faqs.allstore',
                    'faqs.view',
                    'faqs.edit',
                    'faqs.update',
                    'faqs.delete',
                ]
            ],
            [
                'group_name' => 'seminars',
                'permissions' => [
                    // role Permissions
                    'seminars.all',
                    'seminars.create',
                    'seminars.view',
                    'seminars.allstore',
                    'seminars.edit',
                    'seminars.update',
                    'seminars.delete',
                ]
            ],
            [
                'group_name' => 'reviews',
                'permissions' => [
                    // role Permissions
                    'reviews.all',
                    'reviews.create',
                    'reviews.allstore',
                    'reviews.view',
                    'reviews.edit',
                    'reviews.update',
                    'reviews.delete',
                ]
            ], [
                'group_name' => 'contact',
                'permissions' => [
                    // role Permissions
                    'contact.all',
                    'contact.view',
                    'contact.edit',
                    'contact.update',
                    'contact.delete',
                ]
            ],
            [
                'group_name' => 'contactdetalis',
                'permissions' => [
                    // role Permissions
                    'contactdetalis.all',
                    'contactdetalis.create',
                    'contactdetalis.allstore',
                    'contactdetalis.view',
                    'contactdetalis.edit',
                    'contactdetalis.update',
                    'contactdetalis.delete',
                ]
            ],
            [
                'group_name' => 'Approve',
                'permissions' => [
                    // role Permissions
                    'about.access',
                    'about.updateaccess',
                    'achive.access',
                    'achive.updateaccess',
                    'banners.access',
                    'banners.updateaccess',
                    'category.access',
                    'category.updateaccess',
                    'subcategory.access',
                    'subcategory.updateaccess',
                    'post.access',
                    'post.updateaccess',
                    'facilities.access',
                    'facilities.updateaccess',
                    'faqparent.access',
                    'faqparent.updateaccess',
                    'faqdetalies.access',
                    'faqdetalies.updateaccess',
                    'leader.access',
                    'leader.updateaccess',
                    'seminer.access',
                    'seminer.updateaccess',
                    'jobs.access',
                    'jobs.updateaccess',
                    'contact.access',
                    'contact.updateaccess',
                    'support.access',
                    'support.updateaccess',
                    'producer.access',
                    'producer.updateaccess', 
                    'reviews.access',
                    'reviews.updateaccess',
                    'logos.access',
                    'logos.updateaccess',                   

                    
                ]
            ],
            
        ];
         

        //create Permission

       for($i= 0; $i< count($permissions);$i++){
        $permissionGroup = $permissions[$i]['group_name'];
        for($j = 0; $j < count($permissions[$i]['permissions']); $j++){
            
            $permission = Permission::create(['guard_name' => 'admin','name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);

            $rolesuperadmin->givePermissionTo($permission);
            $permission->assignRole($rolesuperadmin);
        }
       
       }


       DB::table('model_has_roles')->insert([
        'role_id' => 1,
        'model_type' => 'App\Admin',
        'model_id' => 1
       ]);

    
    }
}
