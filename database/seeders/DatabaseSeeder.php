<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Employee;
use \App\Models\Department;
use \App\Models\Salary;
use \App\Models\Title;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         for ($i=0; $i < 3; $i++) {
            $department = Department::factory()->create();
            $title = Title::factory()
                        ->count(3)
                        ->for($department)
                        ->create();
         }

         for ($i=0; $i < 30; $i++) {
            $emploee = Employee::factory()->has(Title::factory()->count(2))->create();
            $salary = Salary::factory()
                        ->count(3)
                        ->for($emploee)
                        ->create();
         }

    }
}
