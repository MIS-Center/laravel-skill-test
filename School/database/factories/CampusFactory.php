<?php

namespace Database\Factories;

use App\Models\Campus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $schools = \App\Models\School::pluck('id')->toArray();

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'school_id' => $this->faker->randomElement($schools),
        ];
    }
}
