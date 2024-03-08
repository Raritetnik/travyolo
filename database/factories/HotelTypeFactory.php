<?php

namespace Database\Factories;
use App\Models\HotelType;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelType>
 */
class HotelTypeFactory extends Factory
{

    public function definition()
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{1,25}'),
            'name' => $this->faker->word,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
