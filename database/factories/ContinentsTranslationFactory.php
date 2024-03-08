<?php

namespace Database\Factories;

use App\Models\Continent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContinentsTranslation>
 */
class ContinentsTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $continent = Continent::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->name,
            'continents_code' => $continent->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
