<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ImageCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ImageCategoriesTranslation>
 */
class ImageCategoriesTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    $imgCategories = ImageCategory::factory()->create();

    return [
        'language_country' => $this->faker->locale,
        'name' => $this->faker->word,
        'image_categories_code' => $imgCategories->code,
        'updated_at' => $this->faker->dateTime,
    ];
}

}
