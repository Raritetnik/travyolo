<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RoomCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomCategoriesTranslation>
 */
class RoomCategoriesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $roomCategory = RoomCategory::factory()->create();
        return [
            'language_country' => $this->faker->locale,
            'name' => $this->faker->word,
            'room_categories_code' => $roomCategory->code,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
