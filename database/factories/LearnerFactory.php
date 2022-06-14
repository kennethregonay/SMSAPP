<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Learner>
 */
class LearnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->firstname(),
            'lname' => $this->faker->lastname(),
            'typelearners' => $this->faker->randomElement(['Enrollee', 'Transferee']),
            'glevel' => $this->faker->randomElement(['Grade 6', 'Grade 5', 'Grade 4', 'Grade 3', 'Grade 2', 'Grade 1', 'Kindergarten' ]),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'birthdate' => $this->faker->date('m-d-Y'), 
            'religion' => 'Catholic',
            'mothertongue' => 'Bicol',
            'address' => $this->faker->address(),
            'EnrollmentStatus' => 'Registered',
            'GWA' => $this->faker->randomElement(['81','91']),
            'refNo' => $this->faker->randomNumber(8, true),
            'guardians_id' => 1,
        ];
    }
}

// 'glevel' => $this->faker->randomElement(['Kindergarten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6']),