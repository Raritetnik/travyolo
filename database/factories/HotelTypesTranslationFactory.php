<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HotelType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelTypesTranslation>
 */
class HotelTypesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $typeCode = HotelType::factory()->create();
        return [
            'language_country' => $this->faker->word,
            'name' => $this->faker->word,
            'hotel_types_code' => $typeCode->code,
            'updated_at' => now(),
        ];
    }
}
