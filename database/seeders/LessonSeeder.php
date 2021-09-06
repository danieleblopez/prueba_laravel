<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create(['name' => 'Estructura de Datos', 'description' => 'Descripción de Estructura de Datos']);
        Lesson::create(['name' => 'Filosofía', 'description' => 'Descripción de Filosofía']);
        Lesson::create(['name' => 'IA', 'description' => 'Descripción de IA']);
    }
}
