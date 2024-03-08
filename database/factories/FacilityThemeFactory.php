<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FacilityTheme>
 */
class FacilityThemeFactory extends Factory
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
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
