<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['Guardian', 'Parent']),
            'fname' => $this->faker->firstname(),
            'lname' => $this->faker->lastname(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'educAttain' => $this->faker->randomElement(['Elementary', 'Highschool', 'College']),
            'contactNo' => '09'.$this->faker->randomDigit(9, true),
        ];
    }
}
