<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HotelTheme;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelThemesTranslation>
 */
class HotelThemesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    $hotelTheme = HotelTheme::factory()->create();
    return [
        'language_country' => $this->faker->locale,
        'name' => $this->faker->word,
        'hotel_themes_code' => $hotelTheme->code,
        'updated_at' => $this->faker->dateTime,
    ];
}

}
