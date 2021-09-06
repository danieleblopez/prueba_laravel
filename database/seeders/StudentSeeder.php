<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create(['first_name' => 'Daniel', 'last_name' => 'Barreto', 'email' => 'danieleblopez@gmail.com']);
        $student->lessons()->attach([1, 2, 3]);
    }
}
