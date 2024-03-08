<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationsTranslation;
use App\Models\Region;
use App\Models\RegionsTranslation;
use App\Models\Country;
use App\Models\CountriesTranslation;
use App\Models\Continent;
use App\Models\ContinentsTranslation;
use App\Models\DestinationHasRegions;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class DestinationController extends Controller
{


    /**
     * This function 'insertContinent' is a public function for insert the data in the continent Model(Database)
     * @param array $data - An associative array containing information about the continent to be inserted.
     * @return bool - Returns true if the continent was successfully inserted, false otherwise.
     */
    public function insertContinent($data)
    {
        try {
            Continent::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'updateContinent' is a public function for update the data in the continent Model(Database)
     * @param array $data - An associative array containing information about the continent to be updated.
     * @return bool - Returns true if the continent was successfully updated, false otherwise.
     */
    public function updateContinent($data)
    {

        try {
            $continent = Continent::where('code', $data['code'])->first();
            if (isset($continent)) {
                $continent->update([
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteContinent' is a public function for delete the data in the continent Model(Database)
     * @param array $data - An associative array containing information about the continent to be deleted.
     * @return bool - Returns true if the continent was successfully deleted, false otherwise.
     */
    public function deleteContinent($data)
    {
        try {
            $deleteContinent = Continent::where('code', $data['code'])->first();
            if (isset($deleteContinent)) {
                $deleteContinent->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'insertContinentTranslation' is a public function for insert the data in the continentTranslation Model(Database)
     * @param array $data - An associative array containing information about the continent translation to be inserted.
     * @return bool - Returns true if the continent translation was successfully inserted, false otherwise.
     */
    public function insertContinentTranslation($data)
    {
        try {
            ContinentsTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'continents_code'  => $data['code'],
                'updated_at'       => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'updateContinentTranslation' is a public function for update the data in the continent Translation Model(Database)
     * @param array $data - An associative array containing information about the continent translation to be updated.
     * @return bool - Returns true if the continent was successfully updated, false otherwise.
     */
    public function updateContinentTranslation($data)
    {
        try {
            $continentTranslation = ContinentsTranslation::where('continents_code', $data['code'])
                ->where('language_country', $data['language_country'])->first();
            if (isset($continentTranslation)) {
                $continentTranslation->update([
                    'name'             => $data['name'],
                    'updated_at'       => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteContinentTranslation' is a public function for delete the data in the continent Model(Database)
     * @param array $data - An associative array containing information about the continent translation to be deleted.
     * @return bool - Returns true if the continent translation was successfully deleted, false otherwise.
     */
    public function deleteContinentTranslation($data)
    {
        try {
            $deleteContinentTranslation = ContinentsTranslation::where('continents_code', $data['code'])
                ->where('language_country', $data['language_country'])->first();
            if (isset($deleteContinentTranslation)) {
                $deleteContinentTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }



    /**
     * This function 'insertCountry' is a public function for insert the data in the Country Model(Database)
     * @param array $data - An associative array containing information about the Country to be inserted.
     * @return bool - Returns true if the Country was successfully inserted, false otherwise.
     */
    public function insertCountry($data)
    {
        try {
            Country::create([
                'code'            => $data['code'],
                'name'            => $data['name'],
                'continents_code' => $data['continent'],
                'updated_at'      => now(),

            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'updateCountry' is a public function for update the data in the Country Model(Database)
     * @param array $data - An associative array containing information about the Country to be updated.
     * @return bool - Returns true if the Country was successfully inserted, false otherwise.
     */
    public function updateCountry($data)
    {
        try {
            $country = Country::where('code', $data['code'])->first();
            if (isset($country)) {
                $country->update([
                    'name'            => $data['name'],
                    'continents_code' => $data['continent'],
                    'updated_at'      => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteCountry' is a public function for delete the data in the country Model(Database)
     * @param array $data - An associative array containing information about the country to be deleted.
     * @return bool - Returns true if the country was successfully deleted, false otherwise.
     */
    public function deleteCountry($data)
    {
        try {
            $deleteCountry = Country::where('code', $data['code'])->first();
            if (isset($deleteCountry)) {
                $deleteCountry->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }




    /**
     * This function 'insertContinentTranslation' is a public function for insert the data in the continentTranslation Model(Database)
     * @param array $data - An associative array containing information about the continent Translation to be inserted.
     * @return bool - Returns true if the continent Translation was successfully inserted, false otherwise.
     */
    public function insertCountriesTranslation($data)
    {
        try {
            CountriesTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'countries_code'   => $data['code'],
                'updated_at'       => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'updateCountriesTranslation' is a public function for update the data in the countries Translation Model(Database)
     * @param array $data - An associative array containing information about the countries translation to be updated.
     * @return bool - Returns true if the continent was successfully updated, false otherwise.
     */
    public function updateCountriesTranslation($data)
    {
        try {
            $countriesTranslation = CountriesTranslation::where('countries_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($countriesTranslation)) {
                $countriesTranslation->update([
                    'name'             => $data['name'],
                    'updated_at'       => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'deleteCountriesTranslation' is a public function for delete the data in the countriesTranslation Model(Database)
     * @param array $data - An associative array containing information about the country translation to be deleted.
     * @return bool - Returns true if the country translation was successfully deleted, false otherwise.
     */
    public function deleteCountriesTranslation($data)
    {
        try {
            $deleteCountriesTranslation = CountriesTranslation::where('countries_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if (isset($deleteCountriesTranslation)) {
                $deleteCountriesTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'insertRegion' is a public function for insert the data in the Region Model(Database)
     * @param array $data - An associative array containing information about the Region to be inserted.
     * @return bool - Returns true if the Region was successfully inserted, false otherwise.
     */
    public function insertRegion($data)
    {
        try {
            Region::create([
                'code'            => $data['code'],
                'name'            => $data['name'],
                'kind'            => $data['kind'],
                'state_code'      => $data['state_code'],
                'countries_code'  => $data['country'],
                'updated_at'      => now(),

            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'updateRegion' is a public function for update the data in the region Model(Database)
     * @param array $data - An associative array containing information about the Region to be updated.
     * @return bool - Returns true if the Country was successfully inserted, false otherwise.
     */
    public function updateRegion($data)
    {

        try {
            $region = Region::where('code', $data['code'])->first();
            if (isset($region)) {
                $region->update([
                    'name'            => $data['name'],
                    'kind'            => $data['kind'],
                    'state_code'      => $data['state_code'],
                    'countries_code'  => $data['country'],
                    'updated_at'      => now(),

                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteRegion' is a public function for delete the data in the Region Model(Database)
     * @param array $data - An associative array containing information about the Region to be deleted.
     * @return bool - Returns true if the Region was successfully deleted, false otherwise.
     */
    public function deleteRegion($data)
    {

        try {
            $deleteRegion = Region::where('code', $data['code'])->first();
            if (isset($deleteRegion)) {
                $deleteRegion->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }




    /**
     * This function 'insertRegionTranslation' is a public function for insert the data in the Region Translation Model(Database)
     * @param array $data - An associative array containing information about the Region Translation to be inserted.
     * @return bool - Returns true if the Region Translation was successfully inserted, false otherwise.
     */
    public function insertRegionTranslation($data)
    {

        try {
            RegionsTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'regions_code'     => $data['code'],
                'updated_at'       => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'updateRegionTranslation' is a public function for update the data in the regionTranslation Model(Database)
     * @param array $data - An associative array containing information about the region translation to be updated.
     * @return bool - Returns true if the continent was successfully updated, false otherwise.
     */
    public function updateRegionTranslation($data)
    {

        try {
            $regionTranslation = RegionsTranslation::where('regions_code', $data['code'])->where('language_country', $data['language_country'])->first();
            if (isset($regionTranslation)) {
                $regionTranslation->update([
                    'language_country' => $data['language_country'],
                    'name'             => $data['name'],
                    'regions_code'     => $data['code'],
                    'updated_at'       => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'deleteRegionTranslation' is a public function for delete the data in the region Translation Model(Database)
     * @param array $data - An associative array containing information about the region translation to be deleted.
     * @return bool - Returns true if the region translation was successfully deleted, false otherwise.
     */
    public function deleteRegionTranslation($data)
    {
        try {
            $deleteRegionTranslation = RegionsTranslation::where('regions_code', $data['code'])->where('language_country', $data['language_country'])->first();
            if (isset($deleteRegionTranslation)) {
                $deleteRegionTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'insertDestination' is a public function for insert the data in the Destination Model(Database)
     * @param array $data - An associative array containing information about the destination to be inserted.
     * @return bool - Returns true if the destination was successfully inserted, false otherwise.
     */
    public function insertDestination($data)
    {
        try {
            Destination::create([
                'code'            => $data['code'],
                'name'            => $data['name'],
                'parent'          => $data['parent'],
                'countries_code'  => $data['country'],
                'latitude'        => $data['latitude'],
                'longitude'       => $data['longitude'],
                'updated_at'      => now(),
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'updateDestination' is a public function for update the data in the Destination Model(Database)
     * @param array $data - An associative array containing information about the destination to be updated.
     * @return bool - Returns true if the destination was successfully inserted, false otherwise.
     */
    public function updateDestination($data)
    {

        try {
            $destination = Destination::where('code', $data['code'])->first();
            if(isset($destination)){
                $destination->update([
                    'name'            => $data['name'],
                    'parent'          => $data['parent'],
                    'countries_code'  => $data['country'],
                    'latitude'        => $data['latitude'],
                    'longitude'       => $data['longitude'],
                    'updated_at'      => now(),
                ]);
                return true;
            }else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
        }
    }

    /**
     * This function 'deleteDestination' is a public function for delete the data in the destination Model(Database)
     * @param array $data - An associative array containing information about the destination to be deleted.
     * @return bool - Returns true if the destination was successfully deleted, false otherwise.
     */
    public function deleteDestination($data)
    {

        try {
            $deleteDestination = Destination::where('code', $data['code'])->first();
            if (isset($deleteDestination)) {
                $deleteDestination->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


    /**
     * This function 'insertDestinationTranslation' is a public function for insert the data in the Destination Translation Model(Database)
     * @param array $data - An associative array containing information about the destination translation to be inserted.
     * @return bool - Returns true if the destination translation was successfully inserted, false otherwise.
     */
    public function insertDestinationTranslation($data)
    {

        try {

            DestinationsTranslation::create([
                'language_country'  => $data['language_country'],
                'name'              => $data['name'],
                'destinations_code' => $data['code'],
                'updated_at'        => now(),
            ]);

            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'DestinationTranslation' is a public function for update the data in the destination Translation Model(Database)
     * @param array $data - An associative array containing information about the region translation to be updated.
     * @return bool - Returns true if the continent was successfully updated, false otherwise.
     */
    public function updateDestinationTranslation($data)
    {

        try {
            $destinationTranslation = DestinationsTranslation::where('destinations_code', $data['destinations_code'])->where('language_country', $data['language_country'])->first();
            if (isset($destinationTranslation)) {
                $destinationTranslation->update([
                    'language_country'  => $data['language_country'],
                    'name'              => $data['name'],
                    'destinations_code' => $data['code'],
                    'updated_at'        => now(),
                ]);
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * This function 'deleteDestinationTranslation' is a public function for delete the data in the Destination Translation Model(Database)
     * @param array $data - An associative array containing information about the destination translation to be deleted.
     * @return bool - Returns true if the destination translation was successfully deleted, false otherwise.
     */
    public function deleteDestinationTranslation($data)
    {
        try {
            $deleteDestinationTranslation = DestinationsTranslation::where('destinations_code', $data['destinations_code'])->where('language_country', $data['language_country'])->first();
            if (isset($deleteDestinationTranslation)) {
                $deleteDestinationTranslation->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


     /**
     * Function for insert the data in the Destination has regions Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertDestinationsHasRegions($data)
    {

        try {
            DestinationHasRegions::create([
                'destinations_code'      => $data['destinations_code'],
                'regions_code'           => $data['regions_code'],
            ]);
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the Destination has regions Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateDestinationsHasRegions($data)
    {


        try {
            $destinationHasRegion = DestinationHasRegions::where('destinations_code', $data['destinations_code'])
                ->where('regions_code', $data['regions_code'])->first();
            if (isset($destinationHasRegion)) {
                $destinationHasRegion->update([
                    'destinations_code' => $data['destinations_code'],
                    'regions_code'      => $data['regions_code'],
                ]);
            } else {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }


      /**
     * Function for update the data in the updateImageCategories Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteDestinationHasRegions($data)
    {
        try {
            $deleteDestinationHasRegions = DestinationHasRegions::where('destinations_code', $data['destinations_code'])
                ->where('regions_code', $data['regions_code'])->first();
            if (isset($deleteDestinationHasRegions)) {
                $deleteDestinationHasRegions->delete();
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log::error("exception : " . $e->getMessage());
            return false;
        }
    }










    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destination $destination)
    {
        //
    }
}
