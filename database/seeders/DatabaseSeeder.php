<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Learner;
use App\Models\Guardian;
use App\Models\Announcement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Announcement::factory(20)->create();
        Guardian::factory(1)->create();
        Learner::factory(200)->create();
        User::factory(50)->create();
    }
}
