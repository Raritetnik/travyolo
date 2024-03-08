<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\DestinationController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Continent;
use App\Models\ContinentsTranslation;
use App\Models\CountriesTranslation;
use App\Models\Country;
use App\Models\Destination;
use App\Models\DestinationsTranslation;
use App\Models\Region;
use App\Models\RegionsTranslation;

use Illuminate\Support\Facades\Log;
class UpdateDestinationTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * Function that test the testUpdateContinent method in the DestinationController
     * @return bool
     */
    public function testUpdateContinent()
    {
        $continent = Continent::factory()->create();
        $data = [
            "code"       => $continent->code,
            "name"       => "update " . rand(1, 10),
            "updated_at" => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->updateContinent($data);
        $this->assertTrue($status);
    }


    /**
     * Function that test the testUpdateContinent method in the DestinationController
     * @return bool
     */
    public function testUpdateContinentTranslation()
    {
        $continentTr = ContinentsTranslation::factory()->create();
        $data = [
            "language_country" => $continentTr->language_country,
            "name"             => "Translation update 2 " . rand(1, 10),
            "code"             => $continentTr->continents_code,
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->updateContinentTranslation($data);
        $this->assertTrue($status);
    }


    /**
     * Function that test the testUpdateCountry method in the DestinationController
     * @return bool
     */
    public function testUpdateCountry()
    {
        $country = Country::factory()->create();
        $continent = Continent::factory()->create();
        $data = [
            "code"            => $country->code,
            "continent"       => $continent->code,
            "name"            => "country update" . rand(1, 10),
            "updated_at"      => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->updateCountry($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateCountriesTranslation method in the DestinationController
     * @return bool
     */
    public function testUpdateCountriesTranslation()
    {
        $countryTr = CountriesTranslation::factory()->create();
        $data = [
            "language_country" => $countryTr->language_country,
            "name"             => "Translation update " . rand(1, 10),
            "code"             => $countryTr->countries_code,
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->updateCountriesTranslation($data);
        $this->assertTrue($status);
    }


    /**
     * Function that test the testUpdateCountry method in the DestinationController
     * @return bool
     */
    public function testUpdateRegion()
    {
        $region = Region::factory()->create();
        $country = Country::factory()->create();
        $data = [
            "code"             => $region->code,
            "name"             => "Region update " . rand(1, 10),
            "kind"             => "Province update",
            "state_code"       => "000" . rand(1, 10),
            "country"          => $country->code,
            "updated_at"       => now()

        ];

        $Controller = new DestinationController;
        $status = $Controller->updateRegion($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the testUpdateRegionTranslation method in the DestinationController
     * @return bool
     */
    public function testUpdateRegionTranslation()
    {
        $regionTr = RegionsTranslation::factory()->create();
        $data = [
            "language_country" => $regionTr->language_country,
            "name"             => "Translation update " . rand(1, 10),
            "code"             => $regionTr->regions_code,
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->updateRegionTranslation($data);
        $this->assertTrue($status);
    }


    /**
     * Function that test the testUpdateDestination method in the DestinationController
     * @return bool
     */
    public function testUpdateDestination()
    {
        $destination = Destination::factory()->create();
        $country = Country::factory()->create();
        $data = [
            "code"             => $destination->code,
            "name"             => "Destination update " . rand(1, 10),
            "parent"           => 'Test Parent update',
            "country"          => $country->code,
            "latitude"         => rand(87657, 99999),
            "longitude"        => rand(87657, 99999),
            "updated_at"       => now()
        ];

        $Controller = new DestinationController;
        $status = $Controller->updateDestination($data);
        $this->assertTrue($status);
    }


      /**
     * Function that test the testUpdateDestinationTranslation method in the DestinationController
     * @return bool
     */
    public function testUpdateDestinationTranslation()
    {
        $destinationTr = DestinationsTranslation::factory()->create();
        $data = [
            "language_country" => $destinationTr->language_country,
            "name"             => "Translation update " . rand(1, 10),
            "destinations_code"=> $destinationTr->destinations_code,
            "code"             => $destinationTr->destinations_code,
            "updated_at"       => now()
        ];
        log::error($data);
        $Controller = new DestinationController;
        $status = $Controller->updateDestinationTranslation($data);
        $this->assertTrue($status);
    }

}
