<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hotel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelsTranslation>
 */
class HotelsTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    $hotel = Hotel::factory()->create();

return [
    'language_country'       => $this->faker->locale,
    'hotel_information'      => $this->faker->text(100),
    'hotel_introduction'     => $this->faker->text(100),
    'location_information'   => $this->faker->text(100),
    'attraction_information' => $this->faker->text(100),
    'hotel_amenity'          => $this->faker->text(100),
    'hotels_code'            => $hotel->code, 
    'updated_at'             => $this->faker->dateTime,
];

}

}
