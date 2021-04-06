<?php

namespace Database\Seeders;

use App\Models\Coursetype;
use Illuminate\Database\Seeder;

class CoursetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coursetype::factory()->count(3)->create();
    }
}
