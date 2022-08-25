<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For Dashboard 
        $dashboard = Permission::create([
            'menu_id'   =>  1,
            'key'       =>  'index',
            'url'       =>  'dashboards',
        ]);

        // For Menu

        // Index
        $meIn   =   Permission::create([
            'menu_id'   =>  2,
            'key'       =>  'index',
            'url'       =>  'menus',
        ]);

        // Create
        $meCr   =   Permission::create([
            'menu_id'   =>  2,
            'key'       =>  'create',
            'url'       =>  'menus/create',
        ]);

        // show
        $meSh   =   Permission::create([
            'menu_id'   =>  2,
            'key'       =>  'show',
            'url'       =>  'menus/show',
        ]);

        // Edit
        $meEd   =   Permission::create([
            'menu_id'   =>  2,
            'key'       =>  'edit',
            'url'       =>  'menus/edit',
        ]);

        // Destory
        $meDe   =   Permission::create([
            'menu_id'   =>  2,
            'key'       =>  'delete',
            'url'       =>  'menus/destroy',
        ]);

        // For User

        // Index
        $userIn   =   Permission::create([
            'menu_id'   =>  3,
            'key'       =>  'index',
            'url'       =>  'users',
        ]);

        // Create
        $userCr   =   Permission::create([
            'menu_id'   =>  3,
            'key'       =>  'create',
            'url'       =>  'users/create',
        ]);

        // show
        $userSh   =   Permission::create([
            'menu_id'   =>  3,
            'key'       =>  'show',
            'url'       =>  'users/show',
        ]);

        // Edit
        $userEd   =   Permission::create([
            'menu_id'   =>  3,
            'key'       =>  'edit',
            'url'       =>  'users/edit',
        ]);

        // Destory
        $userDe   =   Permission::create([
            'menu_id'   =>  3,
            'key'       =>  'delete',
            'url'       =>  'users/destroy',
        ]);

        // For Role

        // Index
        $roleIn   =   Permission::create([
            'menu_id'   =>  4,
            'key'       =>  'index',
            'url'       =>  'roles',
        ]);

        // Create
        $roleCr   =   Permission::create([
            'menu_id'   =>  4,
            'key'       =>  'create',
            'url'       =>  'roles/create',
        ]);

        // show
        $roleSh   =   Permission::create([
            'menu_id'   =>  4,
            'key'       =>  'show',
            'url'       =>  'roles/show',
        ]);

        // Edit
        $roleEd   =   Permission::create([
            'menu_id'   =>  4,
            'key'       =>  'edit',
            'url'       =>  'roles/edit',
        ]);

        // Destory
        $roleDe   =   Permission::create([
            'menu_id'   =>  4,
            'key'       =>  'delete',
            'url'       =>  'roles/destroy',
        ]);

        // For Permission

        // Index
        $perIn   =   Permission::create([
            'menu_id'   =>  5,
            'key'       =>  'index',
            'url'       =>  'permissions',
        ]);

        // Create
        $perCr   =   Permission::create([
            'menu_id'   =>  5,
            'key'       =>  'create',
            'url'       =>  'permissions/create',
        ]);

        // show
        $perSh   =   Permission::create([
            'menu_id'   =>  5,
            'key'       =>  'show',
            'url'       =>  'permissions/show',
        ]);

        // Edit
        $perEd   =   Permission::create([
            'menu_id'   =>  5,
            'key'       =>  'edit',
            'url'       =>  'permissions/edit',
        ]);

        // Destory
        $perDe   =   Permission::create([
            'menu_id'   =>  5,
            'key'       =>  'delete',
            'url'       =>  'permissions/destroy',
        ]);

        // For Department

        // Index
        $deIn   =   Permission::create([
            'menu_id'   =>  6,
            'key'       =>  'index',
            'url'       =>  'departments',
        ]);

        // Create
        $deCr   =   Permission::create([
            'menu_id'   =>  6,
            'key'       =>  'create',
            'url'       =>  'departments/create',
        ]);

        // show
        $deSh   =   Permission::create([
            'menu_id'   =>  6,
            'key'       =>  'show',
            'url'       =>  'departments/show',
        ]);

        // Edit
        $deEd   =   Permission::create([
            'menu_id'   =>  6,
            'key'       =>  'edit',
            'url'       =>  'departments/edit',
        ]);

        // Destory
        $deDe   =   Permission::create([
            'menu_id'   =>  6,
            'key'       =>  'delete',
            'url'       =>  'departments/destroy',
        ]);

    }
}
