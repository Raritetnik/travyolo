<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\HotelsHasHotelTheme;
use App\Models\Hotel;
use App\Models\HotelTheme;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelsHasHotelTheme>
 */
class HotelsHasHotelThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $hotel = Hotel::factory()->create();
        $hotelTheme = HotelTheme::factory()->create();

        
        return [
            'hotels_code' => $hotel->code,  
            'hotel_themes_code' => $hotelTheme->code,
        ];
    }
    
}
