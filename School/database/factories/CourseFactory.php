<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $campuses = \App\Models\Campus::pluck('id')->toArray();
        $coursetypes = \App\Models\Coursetype::pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomNumber(2),
            'campus_id' => $this->faker->randomElement($campuses),
            'coursetype_id' => $this->faker->randomElement($coursetypes),
        ];
    }
}
