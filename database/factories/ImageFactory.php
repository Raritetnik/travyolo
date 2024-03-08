<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ImageCategory;
use App\Models\Hotel;
use App\Models\RoomCategory;
use App\Models\Image;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $imageCategories = ImageCategory::factory()->create();
        $hotel = Hotel::factory()->create();
        $roomCategory = RoomCategory::factory()->create();
        return [
            'tag' => $this->faker->word,
            'original' => $this->faker->unique()->regexify('[A-Za-z0-9]{1,25}'),
            'large' => $this->faker->word,
            'small' => $this->faker->word,
            'mid' => $this->faker->word,
            'updated_at' => $this->faker->dateTime,
            'image_categories_code' => $imageCategories->code,
            'room_categories_code' => $roomCategory->code,
            'hotels_code' => $hotel->code,
        ];
    }
}
