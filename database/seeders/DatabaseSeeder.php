<?php

namespace Database\Seeders;

use App\Models\Buch;
use App\Models\Rezension;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Buch::factory(33)->create()->each(function ($buch)
        {
            $numRezension = random_int(5, 30);

            Rezension::factory()->count($numRezension)
                ->gut()
                ->for($buch)
                ->create();
        });

        Buch::factory(33)->create()->each(function ($buch)
        {
            $numRezension = random_int(5, 30);

            Rezension::factory()->count($numRezension)
                ->average()
                ->for($buch)
                ->create();
        });

        Buch::factory(34)->create()->each(function ($buch)
        {
            $numRezension = random_int(5, 30);

            Rezension::factory()->count($numRezension)
                ->schlecht()
                ->for($buch)
                ->create();
        });
    }
}
