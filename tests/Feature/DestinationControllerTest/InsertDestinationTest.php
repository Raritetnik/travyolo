<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Http\Controllers\DestinationController;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Region;

class InsertDestinationTest extends TestCase
{
    use DatabaseTransactions;


   /**
     * Function that test the testInsertContinent method in the DestinationController
     * @return bool
     */
    public function testInsertContinent()
    {
        $data = [
            "code"       => rand(1, 10),
            "name"       => "Insert " . rand(1, 10),
            "updated_at" => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertContinent($data);
        $this->assertTrue($status);
    }


    /**
     * Function that test the testInsertContinentTranslation method in the DestinationController
     * @return bool
     */
    public function testInsertContinentTranslation()
    {
        $continent = Continent::factory()->create();
        $data = [
            'language_country' => 'fr',
            "name"             => "Translation " . rand(1, 10),
            "code"             => $continent->code,
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertContinentTranslation($data);
        $this->assertTrue($status);
    }
    /**
     * Function that test the testInsertCountry method in the DestinationController
     * @return bool
     */
    public function testInsertCountry()
    {
        $continent = Continent::factory()->create();
        $data = [
            "code"            => rand(1, 10),
            "name"            => "country " . rand(1, 10),
            "continent"       => $continent->code,
            "updated_at"      => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertCountry($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testInsertCountriesTranslation method in the DestinationController
     * @return bool
     */
    public function testInsertCountriesTranslation()
    {
        $country = Country::factory()->create();
        $data = [
            'language_country' => 'fr',
            "name"             => "Translation " . rand(1, 10),
            "code"             => $country->code,
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertCountriesTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testInsertRegion method in the DestinationController
     * @return bool
     */
    public function testInsertRegion()
    {
        $country = Country::factory()->create();
        $data = [
            "code"             => rand(1, 10),
            "name"             => "Region " . rand(1, 10),
            "kind"             => "Province ",
            "state_code"       => "000" . rand(1, 10),
            "country"          => $country->code,
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertRegion($data);
        $this->assertTrue($status);
    }
    /**
     * Function that test the testInsertRegionTranslation method in the DestinationController
     * @return bool
     */
    public function testInsertRegionTranslation()
    {
        $region = Region::factory()->create();
        $data = [
            'language_country' => 'fr',
            "name"             => "Translation " . rand(1, 10),
            "code"             => $region->code,
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertRegionTranslation($data);
        $this->assertTrue($status);
    }
    /**
     * Function that test the testInsertDestination method in the DestinationController
     * @return bool
     */
    public function testInsertDestination()
    {
        $country = Country::factory()->create();
        $data = [
            "code"             => rand(1, 10),
            "name"             => "Destination " . rand(1, 10),
            "parent"           => 'Test Parent',
            "country"          => $country->code,
            "latitude"         => rand(87657, 99999),
            "longitude"        => rand(87657, 99999),
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertDestination($data);
        $this->assertTrue($status);
    }
    /**
     * Function that test the testInsertDestinationTranslation method in the DestinationController
     * @return bool
     */
    public function testInsertDestinationTranslation()
    {
        $destination = Destination::factory()->create();
        $data = [
            'language_country'  => 'fr',
            "name"              => "Translation " . rand(1, 10),
            "code"              => $destination->code,
            "updated_at"        => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->insertDestinationTranslation($data);
        $this->assertTrue($status);
    }
}
