<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Controllers\HotelController;
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
use App\Models\RoomCategory;
use Tests\TestCase;
use Faker\Generator;

class UpdateHotelTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Function that test the testUpdateChain method in the HotelController
     * @return bool
     */

    public function testUpdateChain()
    {
        $chain = Chain::factory()->create();
        $data = [
            "code" => $chain->code,
            "name" => "update chain test",
            "updated_at" => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateChain($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotelType method in the HotelController
     * @return bool
     */

    public function testUpdateHotelType()
    {
        $hotelType = HotelType::factory()->create();

        $data = [
            "code" => $hotelType->code,
            "name" => "update hotel test",
            "updated_at" => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateHotelType($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotelType method in the HotelController
     * @return bool
     */
    
    public function testUpdateHotelTypeTranslation()
    {
        $hotelTypeTranslation = HotelTypesTranslation::factory()->create();
        
        $data = [
            "language_country" => $hotelTypeTranslation->language_country,
            "name"             => " Hotel type translation update " . rand(1, 10),
            "code"             => $hotelTypeTranslation->hotel_types_code,
            "updated_at"       => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateHotelTypeTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotel method in the HotelController
     * @return bool
     */

    
    public function testUpdateHotel()
    {
        $hotelType = HotelType::factory()->create();
        $hotel = Hotel::factory()->create();
        $destination = Destination::factory()->create();
        $data = [
            "code"                    => $hotel->code,
            "master"                  => "test master ",
            "name"                    => "update hotel" . rand(1, 10),
            "zipcode"                 => rand(1000, 2000) . " NX ",
            "address"                 => "DE LAIRESSESTRART " . rand(1, 10),
            "latitude"                => rand(1, 100) . "." . rand(7898, 9876),
            "longitude"               => rand(1, 100) . "." . rand(7898, 9876),
            "stars"                   => rand(1, 9) . "." . rand(0, 9),
            "nr_rooms"                => rand(0, 100),
            "nr_restaurants"          => rand(1, 10),
            "nr_bars"                 => rand(1, 10),
            "nr_halls"                => rand(1, 10),
            "year_built"              => rand(1, 10),
            "checkin_from"            => 14,
            "checkout_to"             => 12,

            'checkout_from'           => 10,
            'checkin_to'              => 17,
            'gmt_offset'              => "UTC EMB",
            'email'                   => 'exemple@example.com',
            'phone'                   => rand(10000, 90000000),
            'currencycode'            => 'cur',
            'availability_score'      => rand(1, 10),
            'hotel_score'             => rand(1, 10),
            'book_score'              => rand(1, 10),
            'room_amenity'            => 'ipsun ipsun EMB Hotel Memphis lorem',

            "hotel_information"       => "lorem ipsun ipsun ipsun EMB Hotel Memphis is a deluxe hotel located in the fashionable heart of Amsterdam. With its ivy- covered facade, this hotel is the perfect place to sample the charm of one of Europe's most cosmopolitan cities.",
            "hotel_introduction"      => "Ideal for sight seeing, the Gresham Memphis is within walking distance from the famous Rijks Museum, Van Gough Museum and Heineken Brewery tour. Also the surrounding area is packed with boutiques, charming cafes and tempting bistros",
            "location_information"    => "Location information of the hotel providing where the hotel is located within the destination and some details on the neighborhood, transportation and statement  on how to get the hotel",
            "attraction_information"  => "Attraction information of the hotel providing details on the tourist attractions, popular landmarks, important points such as places to visit around the hotel, near activities etc",
            "hotel_amenity"           => "test test test ",
            "chains_code"             => rand(1, 10),
            "destination"             => $destination->code,
            "hotel_type"              => $hotelType->code,
            "updated_at"              => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateHotel($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotelTranslation method in the HotelController
     * @return bool
     */
    
    public function testUpdateHotelTranslation()
    {
        $hotelTranslation = HotelsTranslation::factory()->create();  

        $data = [
            "language_country"       => $hotelTranslation->language_country,
            "hotel_information"      => " L'EMB Hotel Memphis est un hôtel de luxe situé dans le cœur branché d'Amsterdam. Avec sa façade couverte de lierre, ..",
            "hotel_introduction"     => "Idéal pour visiter, le Gresham  Les environs regorgent également de boutiques, de cafés charmants et de bistrots alléchants.",
            "location_information"   => "Informations sur l'emplacement de l'hôtel :  les moyens de transport et indications sur la façon de se rendre à l'hôtel.",
            "attraction_information" => "Informations sur les attractions  les points importants tels que les lieux à visiter autour de l'hôtel, les activités à proximité, etc.",
            "hotel_amenity"          => "test test test fr ",
            "hotels_code"            => $hotelTranslation->hotels_code,
            "updated_at"             => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateHotelTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotelTheme method in the HotelController
     * @return bool
     */

    public function testUpdateHotelTheme()
    {
        $hotelTheme = HotelTheme::factory()->create();
        $data = [
            "code" => $hotelTheme->code,
            "name" => "update hotel theme",
            "updated_at" => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateHotelTheme($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotelTheme method in the HotelController
     * @return bool
     */

     public function testUpdateHotelThemeTranslation()
    {
        $hotelThemeTranslation = HotelThemesTranslation::factory()->create();
        $data = [
            "language_country" => $hotelThemeTranslation->language_country,
            "name"             => " Hotel theme translation update " . rand(1, 10),
            "code"             => $hotelThemeTranslation->hotel_themes_code,
            "updated_at"       => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateHotelThemeTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotelsHasHotelTheme method in the HotelController
     * @return bool
     */

    public function testUpdateHotelsHasHotelTheme()
    {
        $hotelsHasHotelTheme = HotelsHasHotelTheme::factory()->create();
        $data = [
            "hotels_code"       => $hotelsHasHotelTheme->hotels_code,
            "hotel_themes_code" => $hotelsHasHotelTheme->hotel_themes_code,
        ];

        $controller = new HotelController;
        $status = $controller->updateHotelsHasHotelTheme($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateHotelsHasChains method in the HotelController
     * @return bool
     */

    public function testUpdateHotelsHasChains()
    {
        
        $hotelsHaschains = HotelsHasChains::factory()->create();
        $data = [
            "hotels_code"       => $hotelsHaschains->hotels_code,
            "chains_code"       => $hotelsHaschains->chains_code,
        ];

        $Controller = new HotelController;
        $status = $Controller->updateHotelsHasChains($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateImageCategories method in the HotelController
     * @return bool
     */
    
    public function testUpdateImageCategory()
    {
        $imageCategories = ImageCategory::factory()->create();
        $data = [
            "code" => $imageCategories->code,
            "name" => "update image categories test",
            "updated_at" => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateImageCategory($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateImageCategoriesTranslation method in the HotelController
     * @return bool
     */

     public function testUpdateImageCategoriesTranslation()
    {
        $imgCategoriesTranslation = ImageCategoriesTranslation::factory()->create();
        $data = [
            "language_country" => $imgCategoriesTranslation->language_country,
            "name"             => " image categories translation update " . rand(1, 10),
            "image_categories_code" => $imgCategoriesTranslation->image_categories_code,
            "updated_at"       => now()
        ];

        $controller = new HotelController;
        $status = $controller->updateImageCategoriesTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateImage method in the HotelController
     * @return bool
     */

    public function testUpdateImage()
    {
        $imageCategory = ImageCategory::factory()->create();
        $roomCategory = RoomCategory::factory()->create();
        $image = Image::factory()->create();
        $data = [
            "tag"                   => " tag update",
            "original"              => $image->original,
            "large"                 => "https://s3-eu-west-1.amazonaws.com/cosmos-photos/thumbnails/large/14/558f5944c399c5f89c8505cde1641e44-1118155.jpg",
            "small"                 => "https://s3-eu-west-1.amazonaws.com/cosmos-photos/thumbnails/small/14/558f5944c399c5f89c8505cde1641e44-1118155.jpg",
            "mid"                   => "https://s3-eu-west-1.amazonaws.com/cosmos-photos/thumbnails/mid/14/558f5944c399c5f89c8505cde1641e44-1118155.jpg",
            "hotels_code"           => $image->hotels_code,
            "image_categories_code" => $imageCategory->code,
            "room_categories_code"  => $roomCategory->code,
            "updated_at"            => now(),
        ];

        $Controller = new HotelController;
        $status = $Controller->updateImages($data);
        $this->assertTrue($status);
    }
}
