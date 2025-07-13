<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rezension>
 */
class RezensionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'buch_id' => null,
            'rezension' => fake()->paragraph,
            'bewertung' => fake()->numberBetween(1, 5),
            'created_at' => fake()->dateTimeBetween('-2 years'),
            'updated_at' => function (array $attributes)
            {
                return fake()->dateTimeBetween($attributes['created_at']);
            }
        ];


    }
    public function gut()
    {
        return $this->state(function (array $attributes)
        {
            return[
                'bewertung' => fake()->numberBetween(4, 5)
            ];
        });
    }

    public function average()
    {
        return $this->state(function (array $attributes)
        {
            return[
                'bewertung' => fake()->numberBetween(2, 5)
            ];
        });
    }

    public function schlecht()
    {
        return $this->state(function (array $attributes)
        {
            return[
                'bewertung' => fake()->numberBetween(1, 3)
            ];
        });
    }
}
