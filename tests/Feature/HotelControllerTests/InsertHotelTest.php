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
use App\Models\RoomCategory;
use App\Models\HotelsHasChains;
use App\Models\HotelThemesTranslation;
use App\Models\HotelTypesTranslation;
use Tests\TestCase;
use Faker\Generator;
class InsertHotelTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * Function that test the testInsertHotel method in the HotelController
     * @return bool
     */
    public function testInsertHotel()
    {
        $hotelType = HotelType::factory()->create();
        $destination = Destination::factory()->create();
        $data = [
            "code"                    => rand(1, 10),
            "master"                  => "test master ",
            "name"                    => "Insert hotel" . rand(1, 10),
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
        
            "hotel_information"       => "lorem ipsun ipsun ipsun EMB Hotel Memphis is a deluxe hotel located in the fashionable heart of Amsterdam. With its ivy- covered facade .",
            "hotel_introduction"      => "Ideal for sight seeing, the Gresham Memphis is within walking distance from the famous Rijks Museum, Van Gough Museum and Heineken Brewery tour",
            "location_information"    => "Location information of the hotel providing where the hotel is located within the destination and some details on the neighborhood",
            "attraction_information"  => "Attraction information of the hotel providing details on the tourist attractions.",
            "hotel_amenity"           => "test test test ",
            "destination"             => $destination->code,
            "hotel_type"              => $hotelType->code,
            "updated_at"              => now()
        ];

        $controller = new HotelController;
        $status = $controller->insertHotel($data);
        $this->assertTrue($status);
    }


    /**
     * Function that test the testInsertChain method in the HotelController
     * @return bool
     */
    public function testInsertChain()
{

    $data = [
        "code"       => rand(1, 10),
        "name"       => "Insert chain" . rand(1, 10),
        "updated_at" => now(),
    ];

    $controller = new HotelController;
    $status = $controller->insertChain($data);
    $this->assertTrue($status);
}


    /**
     * Function that test the testInsertHotelType method in the HotelController
     * @return bool
     */
    public function testInsertHotelType()
    {
        $data = [
            "code"       => rand(1, 10),
            "name"       => "Insert Hotel type",
            "updated_at" => now(),
        ];

        $Controller = new HotelController;
        $status = $Controller->insertHotelType($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testInsertHotelTypeTranslation method in the HotelController
     * @return bool
     */
    public function testInsertHotelTypeTranslation()
    {
        $hotelType = HotelType::factory()->create();
        $data = [
            "language_country" => "fr",
            "name"             => " Hotel type translation " . rand(1, 10),
            "code"             => $hotelType->code,
            "updated_at"       => now(),
        ];

        $Controller = new HotelController;
        $status = $Controller->insertHotelTypeTranslation($data);
        $this->assertTrue($status);
    }

    
    /**
     * Function that test the testInsertHotelTranslation method in the HotelController
     * @return bool
     */
    public function testInsertHotelTranslation()
    {
        $hotel = Hotel::factory()->create();

        $data = [
            "language_country"        => "fr",
            "hotel_information"       => "L'EMB Hotel Memphis est un hôtel de luxe situé dans le cœur branché d'Amsterdam. Avec sa façade couverte de lierre, cet hôtel est l'endroit idéal pour goûter au charme de l'une des villes les plus cosmopolites d'Europe..",
            "hotel_introduction"      => "Idéal pour visiter, le Gresham Memphis se trouve à quelques pas des célèbres musées Rijks et Van Gough et de la brasserie Heineken. Les environs regorgent également de boutiques, de cafés charmants et de bistrots alléchants.",
            "location_information"    => "Informations sur l'emplacement de l'hôtel : emplacement de l'hôtel par rapport à la destination, détails sur le quartier, les moyens de transport et indications sur la façon de se rendre à l'hôtel.",
            "attraction_information"  => "Informations sur les attractions de l'hôtel fournissant des détails sur les attractions touristiques, les points de repère populaires, les points importants tels que les lieux à visiter autour de l'hôtel, les activités à proximité, etc.",
            "hotel_amenity"           => "test test test fr ",
            "code"                    => $hotel->code,
            "updated_at"              => now(),
        ];

        $controller = new HotelController;
        $status = $controller->insertHotelTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testInsertHotelTheme method in the HotelController
     * @return bool
     */
    public function testInsertHotelTheme()
    {

        $data = [
            "code"       => rand(1, 10),
            "name"       => "Insert Hotel theme" . rand(1, 10),
            "updated_at" => now(),
        ];

        $Controller = new HotelController;
        $status = $Controller->insertHotelTheme($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testInsertHotelThemeTranslation method in the HotelController
     * @return bool
     */
    public function testInsertHotelThemeTranslation()
{
    $hotelTheme = HotelTheme::factory()->create();

    $data = [
        "language_country"  => "fr",
        "name"              => " translation " . rand(1, 10),
        "code"              => $hotelTheme->code, 
        "updated_at"       => now()
    ];

    $controller = new HotelController;
    $status = $controller->insertHotelThemeTranslation($data);
    $this->assertTrue($status);
}


    /**
     * Function that test the testInsertHotelsHasHotelTheme method in the HotelController
     * @return bool
     */
    public function testInsertHotelsHasHotelTheme()
    {
        $hotels = Hotel::factory()->create();
        $hotelTheme = HotelTheme::factory()->create();

        $data = [
            "hotels_code"       => $hotels->code,
            "hotel_themes_code" => $hotelTheme->code,
        ];

        $controller = new HotelController;
        $status = $controller->insertHotelsHasHotelTheme($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testInsertHotelsHasChains method in the HotelController
     * @return bool
     */
    public function testInsertHotelsHasChains()
    {
        $hotels = Hotel::factory()->create();
        $chains = Chain::factory()->create();
        
        $data = [
            "hotels_code"  => $hotels->code,
            "chains_code"  => $chains->code,
        ];

        $controller = new HotelController;
        $status = $controller->insertHotelsHasChains($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testInserImageCategory method in the HotelController
     * @return bool
     */
    public function testInsertImageCategory()
{
    $data = [
        "code"       => rand(1,10),
        "name"       => "Insert image categories " . rand(1, 10),
        "updated_at" => now()
    ];


    $controller = new HotelController;
    $status = $controller->insertImageCategory($data);
    $this->assertTrue($status);
}


    /**
     * Function that test the testInsertHotelThemeTranslation method in the HotelController
     * @return bool
     */
    public function testInsertImageCategoriesTranslation()
{
    $imageCategory = ImageCategory::factory()->create();
    $data = [
        "language_country"      => "fr",
        "name"                  => "image categories translation " . rand(1, 10),
        "code" => $imageCategory->code,
        "updated_at"            => now()
    ];

    $controller = new HotelController;
    $status = $controller->insertImageCategoriesTranslation($data);
    $this->assertTrue($status);
}



    /**
     * Function that test the testInsertImage method in the HotelController
     * @return bool
     */
    public function testInsertImage()
    {
        $imageCategory = ImageCategory::factory()->create();
        $roomCategory = RoomCategory::factory()->create();
        $hotel = Hotel::factory()->create();
        
        $data = [
            "tag"                   => " tag test",
            "original"              => "https://s3-eu-west-1.amazonaws.com/cosmos-photos/14/558f5944c399c5f89c8505cde1641e44-1118155.jpg",
            "large"                 => "https://s3-eu-west-1.amazonaws.com/cosmos-photos/thumbnails/large/14/558f5944c399c5f89c8505cde1641e44-1118155.jpg",
            "small"                 => "https://s3-eu-west-1.amazonaws.com/cosmos-photos/thumbnails/small/14/558f5944c399c5f89c8505cde1641e44-1118155.jpg",
            "mid"                   => "https://s3-eu-west-1.amazonaws.com/cosmos-photos/thumbnails/mid/14/558f5944c399c5f89c8505cde1641e44-1118155.jpg",
            "image_categories_code" => $imageCategory->code,
            "hotels_code"           => $hotel->code,
            "room_categories_code"  => $roomCategory->code,
            "updated_at"            => now()
        ];


        $Controller = new HotelController;
        $status = $Controller->insertImages($data);
        $this->assertTrue($status);
    }
}
