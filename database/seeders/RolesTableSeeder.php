<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootadmin = Role::create([
            'name'          =>  'root-admin',
            'display_name'  =>  "Root Admin",
        ]);

        $admin = Role::create([
            'name'          =>  'admin',
            'display_name'  =>  'Admin',
        ]);

        $staff = Role::create([
            'name'          =>  'normal',
            'display_name'  =>  'Staff',
        ]); 
    }
}
