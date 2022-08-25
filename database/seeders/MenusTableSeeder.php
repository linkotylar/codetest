<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dashboard = Menu::create([
            'name'      =>  'Dashboards',
            'icon'      =>  'fas fa-tachometer-alt',
            'order_by'  =>  1,
        ]);

        $menu = Menu::create([
            'name'      =>  'Menus',
            'icon'      =>  'fas fa-bars',
            'order_by'  =>  29,
        ]);

        $user = Menu::create([
            'name'      =>  'Users',
            'icon'      =>  'fa fa-user',
            'order_by'  =>  30,
        ]);

        $role = Menu::create([
            'name'      =>  'Roles',
            'icon'      =>  'fa fa-tasks',
            'order_by'  =>  32,
        ]);

        $permission = Menu::create([
            'name'      =>  'Permissions',
            'icon'      =>  'fa fa-lock',
            'order_by'  =>  33,
        ]);

        $department = Menu::create([
            'name'      =>  'Departments',
            'icon'      =>  'fa fa-building',
            'order_by'  =>  31,
        ]);
    }
}
