<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Coursetype;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   //     Course::factory()->count(3)->create();
        Course::factory()
        ->has(Coursetype::factory()->count(3))
        ->create();
    }
}
