<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Department::create([
            'department'    =>  'Admin Department'
        ]);

        $hr = Department::create([
            'department'    =>  'HR Department'
        ]);

        $marketing = Department::create([
            'department'    =>  'Marketing Department'
        ]);
    }
}
