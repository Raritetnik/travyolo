<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RoomType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomTypeTranslation>
 */
class RoomTypesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roomType = RoomType::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->word,
            'room_types_code' => $roomType->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
