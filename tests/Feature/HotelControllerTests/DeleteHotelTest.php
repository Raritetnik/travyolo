<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\HotelController;
use Tests\TestCase;
use App\Models\Hotel;
use App\Models\Chain;
use App\Models\Destination;
use App\Models\Country;
use App\Models\HotelTheme;
use App\Models\HotelType;
use App\Models\HotelsTranslation;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\ImageCategoriesTranslation;
use App\Models\HotelsHasHotelTheme;
use App\Models\HotelsHasChains;
use App\Models\HotelThemesTranslation;
use App\Models\HotelTypesTranslation;

class DeleteHotelTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Function that test the testDeleteChain method in the HotelController
     * @return bool
     */

    public function testDeleteChain()
    {
        $chain = Chain::factory()->create();

        $controller = new HotelController;
        $status = $controller->deleteChain($chain);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('chains', ['code' => $chain->code]);

    }

    /**
     * Function that test the testDeleteChain method in the HotelController
     * @return bool
     */

    public function testDeleteHotelType()
    {
        $hotelTypes = HotelType::factory()->create();

        $controller = new HotelController;
        $status = $controller->deleteHotelType($hotelTypes);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotel_Types', ['code' => $hotelTypes->code]);

    }

    /**
     * Function that test the testDeleteHotelTypeTranslation method in the HotelController
     * @return bool
     */

    public function testDeleteHotelTypeTranslation()
    {
        $hotelTypesTranslation = HotelTypesTranslation::factory()->create();
        $hotelTypesTranslation->code = $hotelTypesTranslation->hotel_types_code;

        $controller = new HotelController;
        $status = $controller->deleteHotelTypeTranslation($hotelTypesTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotel_types_translations', [
        'hotel_types_code' => $hotelTypesTranslation->code,
        'language_country' => $hotelTypesTranslation->language_country
    ]);

    }

    /**
     * Function that test the testDeleteHotel method in the HotelController
     * @return bool
     */

    public function testDeleteHotel()
    {
        $hotel = Hotel::factory()->create();

        $controller = new HotelController;
        $status = $controller->deleteHotel($hotel);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotels', ['code' => $hotel->code]);

    }

    /**
     * Function that test the testDeleteHotel method in the HotelController
     * @return bool
     */

    public function testDeleteHotelTranslation()
    {
        $hotelTranslation = HotelsTranslation::factory()->create();
        $hotelTranslation->code = $hotelTranslation->hotels_code;

        $controller = new HotelController;
        $status = $controller->deleteHotelTranslation($hotelTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotels_translations', [
            'hotels_code'      => $hotelTranslation->code,
            'language_country' => $hotelTranslation->language_country
        ]);
    }

    /**
     * Function that test the testDeleteHotelTheme method in the HotelController
     * @return bool
     */

    public function testDeleteHotelTheme()
    {
        $hotelTheme = HotelTheme::factory()->create();

        $controller = new HotelController;
        $status = $controller->deleteHotelTheme($hotelTheme);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotel_themes', ['code' => $hotelTheme->code]);

    }

    /**
     * Function that test the testDeleteHotelThemeTranslation method in the HotelController
     * @return bool
     */

    public function testDeleteHotelThemeTranslation()
    {
        $hotelThemeTranslation = HotelThemesTranslation::factory()->create();
        $hotelThemeTranslation->code = $hotelThemeTranslation->hotel_themes_code;
        

        $controller = new HotelController;
        $status = $controller->deleteHotelThemeTranslation($hotelThemeTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotel_themes_translations', [
            "language_country" =>  $hotelThemeTranslation->language_country,
            "hotel_themes_code" =>  $hotelThemeTranslation->code
        ]);
    }

    /**
     * Function that test the testDeleteHotelsHasHotelTheme method in the HotelController
     * @return bool
     */

    public function testDeleteHotelsHasHotelTheme()
    {
        $hotelsHasHotelTheme = HotelsHasHotelTheme::factory()->create();
        $hotelsHasHotelTheme->code = $hotelsHasHotelTheme->hotels_code;

        $Controller = new HotelController;
        $status = $Controller->deleteHotelsHasHotelTheme($hotelsHasHotelTheme);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotels_has_hotel_themes', [
            'hotels_code'       => $hotelsHasHotelTheme->hotels_code,
            'hotel_themes_code' => $hotelsHasHotelTheme->hotel_themes_code
        ]);
    }

    /**
     * Function that test the testDeleteHotelsHasHotelTheme method in the HotelController
     * @return bool
     */

    public function testDeleteHotelsHasChains()
    {
        
        $hotelsHasChains = HotelsHasChains::factory()->create();
        $hotelsHasChains->code = $hotelsHasChains->hotels_code;

        $Controller = new HotelController;
        $status = $Controller->deleteHotelsHasChains($hotelsHasChains);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('hotels_has_chains', [
            'hotels_code' => $hotelsHasChains->code,
            'chains_code' => $hotelsHasChains->chains_code
        ]);
    }

    /**
     * Function that test the testDeleteChain method in the HotelController
     * @return bool
     */

    public function testDeleteImageCategory()
    {
        $imageCategory = ImageCategory::factory()->create();

        $controller = new HotelController;
        $status = $controller->deleteImageCategory($imageCategory);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('image_categories', ['code' => $imageCategory->code]);

    }

    /**
     * Function that test the testDeleteHotelThemeTranslation method in the HotelController
     * @return bool
     */

    public function testDeleteImageCategoriesTranslation()
    {
        $imageCategoriesTranslation = ImageCategoriesTranslation::factory()->create();
        $imageCategoriesTranslation->code = $imageCategoriesTranslation->image_categories_code;

        $controller = new HotelController;
        $status = $controller->deleteImageCategoriesTranslation($imageCategoriesTranslation);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('image_categories_translations', [
            'image_categories_code' => $imageCategoriesTranslation->code,
            'language_country' => $imageCategoriesTranslation->language_country
        ]);
    }

    /**
     * Function that test the testDeleteHotelThemeTranslation method in the HotelController
     * @return bool
     */

     public function testDeleteImage()
     {
         $image = Image::factory()->create();
        $data = ['original' => $image->original,
        'hotels_code' => $image->hotels_code];
         $controller = new HotelController;
         $status = $controller->deleteImages($data);
         $this->assertTrue($status);
        
         $this->assertDatabaseMissing('images', [
             'original' => $image->original,
             'hotels_code' => $image->hotels_code
         ]);
     }
     
}
