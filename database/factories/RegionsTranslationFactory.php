<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RegionsTranslation>
 */
class RegionsTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $region = Region::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->name,
            'regions_code' => $region->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
