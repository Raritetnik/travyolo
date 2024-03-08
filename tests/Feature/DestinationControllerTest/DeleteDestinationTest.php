<?php

namespace Tests\Feature;

use App\Models\ContinentsTranslation;
use App\Models\DestinationsTranslation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\DestinationController;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Continent;
use App\Models\CountriesTranslation;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Region;
use App\Models\RegionsTranslation;
use Illuminate\Support\Facades\Log;

class DeleteDestinationTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * Function that test the testDeleteContinent method in the DestinationController
     * @return bool
     */
    public function testDeleteContinent()
    {
        $continent = Continent::factory()->create();

        $controller = new DestinationController;
        $status = $controller->deleteContinent($continent);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('continents', ['code' => $continent->code]);
    }


    /**
     * Function that test the testDeleteContinentTranslation method in the DestinationController
     * @return bool
     */
    public function testDeleteContinentTranslation()
    {
        $continentTr = ContinentsTranslation::factory()->create();
        $continentTr->code = $continentTr->continents_code;

        $controller = new DestinationController;
        $status = $controller->deleteContinentTranslation($continentTr);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('continents_translations', [
            'continents_code' => $continentTr->code,
            'language_country' => $continentTr->language_country
        ]);
    }

    /**
     * Function that test the testDeleteCountry method in the DestinationController
     * @return bool
     */
    public function testDeleteCountry()
    {
        $country = Country::factory()->create();

        $controller = new DestinationController;
        $status = $controller->deleteCountry($country);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('countries', ['code' => $country->code]);
    }

    /**
     * Function that test the testDeleteCountriesTranslation method in the DestinationController
     * @return bool
     */
    public function testDeleteCountriesTranslation()
    {
        $countryTr = CountriesTranslation::factory()->create();
        $countryTr->code = $countryTr->countries_code;

        $controller = new DestinationController;
        $status = $controller->deleteCountriesTranslation($countryTr);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('countries_translations', [
            'countries_code' => $countryTr->code,
            'language_country' => $countryTr->language_country
        ]);
    }

    /**
     * Function that test the testDeleteRegion method in the DestinationController
     * @return bool
     */
    public function testDeleteRegion()
    {
        $region = Region::factory()->create();

        $controller = new DestinationController;
        $status = $controller->deleteRegion($region);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('regions', ['code' => $region->code]);
    }


    /**
     * Function that test the testDeleteRegionTranslation method in the DestinationController
     * @return bool
     */
    public function testDeleteRegionTranslation()
    {
        $regionTr = RegionsTranslation::factory()->create();
        $regionTr->code = $regionTr->regions_code;

        $controller = new DestinationController;
        $status = $controller->deleteRegionTranslation($regionTr);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('regions_translations', [
            'regions_code' => $regionTr->code,
            'language_country' => $regionTr->language_country
        ]);
    }

    /**
     * Function that test the testDeleteRegion method in the DestinationController
     * @return bool
     */
    public function testDeleteDestination()
    {
        $destination = Destination::factory()->create();

        $controller = new DestinationController;
        $status = $controller->deleteDestination($destination);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('destinations', ['code' => $destination->code]);
    }

       /**
     * Function that test the testDeleteRegionTranslation method in the DestinationController
     * @return bool
     */
    public function testDeleteDestinationTranslation()
    {
        $detinationTr = DestinationsTranslation::factory()->create();
        $detinationTr->code = $detinationTr->regions_code;

        $controller = new DestinationController;
        $status = $controller->deleteDestinationTranslation($detinationTr);
        $this->assertTrue($status);
        $this->assertDatabaseMissing('destinations_translations', [
            'destinations_code' => $detinationTr->code,
            'language_country' => $detinationTr->language_country
        ]);
    }
}
