<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootuser = User::create([
            'role_id'       =>  1,
            'name'          =>  'Root Admin',
            'email'         =>  'root@admin.com',
            'password'      =>  bcrypt('password'),
            'department_id' =>  1,
        ]);

        $admin = User::create([
            'role_id'       =>  2,
            'name'          =>  'Admin',
            'email'         =>  'admin@admin.com',
            'password'      =>  bcrypt('password'),
            'department_id' =>  1,
        ]);

        $staff = User::create([
            'role_id'       =>  3,
            'name'          =>  'Lin Ko',
            'email'         =>  'linko@admin.com',
            'password'      =>  bcrypt('password'),
            'department_id' =>  2,
        ]);
    }
}
