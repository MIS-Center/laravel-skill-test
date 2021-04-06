<?php

namespace Database\Factories;

use App\Models\Coursetype;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursetypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coursetype::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courses = \App\Models\Course::pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'course_id' => $this->faker->randomElement($courses),
        ];
    }
}
