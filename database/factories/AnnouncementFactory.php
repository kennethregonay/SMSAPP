<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
  
    public function definition()
    {
        return [
            'title' => $this->faker->words(),
            'desc' => $this->faker->sentence(),
            'date' => $this->faker->dateTimeInInterval('now')->format("Y-m-d"),
            'user_id' => 1,
        ];
    }
}
