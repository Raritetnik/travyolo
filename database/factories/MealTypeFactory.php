<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealType>
 */
class MealTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Za-z0-9]{25}'),
            'name' => $this->faker->word,
            'score' => $this->faker->numberBetween(0, 100),
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
