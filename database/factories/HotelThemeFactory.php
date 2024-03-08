<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HotelTheme;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelTheme>
 */

class HotelThemeFactory extends Factory
{
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{25}'),
            'name' => $this->faker->word,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

