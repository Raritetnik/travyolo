<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\DestinationController;
use App\Models\Continent;
use App\Models\ContinentsTranslation;
use App\Models\Country;
use App\Models\CountriesTranslation;
use App\Models\Destination;
use App\Models\Region;
use App\Models\RegionsTranslation;
use App\Models\DestinationsTranslation;
use App\Models\DestinationHasRegions;



class GetDataDestination implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $URL_PROVIDER_API;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->URL_PROVIDER_API = env('API_URL');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->clearAndFetchContinent();

        $this->clearAndFetchContinentTranslation();

        $this->clearAndFetchCountries();

        $this->clearAndFetchCountriesTranslation();

        $this->clearAndFetchRegions();

        $this->clearAndFetchRegionsTranslation();

        $this->clearAndFetchDestinations();

        $this->clearAndFetchDestinationsTranslation();

        $this->clearAndFetchDestinationHasRegions();
    }

    /**
     * This function is designed to synchronize the continents data with an external API.
     * It clears the current continents data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchContinent()
    {
        $API_NAME = "continents";
        try {
            //Function to get all the entries from the table continents and then empty  the table
            $count = Continent::count();
            if ($count != 0) {
                $deletedFiles = Continent::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Continents ");
            }
            //Function to get the data from API and then insert it into the table Continents
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> Continents');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $isValid = $destination->insertContinent($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the continents Translation data with an external API.
     * It clears the current continents translation data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchContinentTranslation()
    {
        $API_NAME = "continents/translations";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table continents translation and then empty  the table
            $count = ContinentsTranslation::count();

            if ($count != 0) {
                $deletedFiles = ContinentsTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> continent translations ");
            }
            //Function to get the data from API and then insert it into the table Continents translations

            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> continent translations');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $key['language_country'] = $API_LANGUAGE;
                    $isValid = $destination->insertContinentTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the countries data with an external API.
     * It clears the current countries data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchCountries()
    {
        $API_NAME = "countries";
        try {
            //Function to get all the entries from the table country and then empty  the table
            $count = Country::count();
            if ($count != 0) {
                $deletedFiles = Country::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> country ");
            }
            //Function to get the data from API and then insert it into the table country
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> countries ');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
                    $isValid = $destination->insertCountry($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the countries Translation data with an external API.
     * It clears the current countries translation data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchCountriesTranslation()
    {
        $API_NAME = "countries/translations";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table countries translations and then empty  the table
            $count = CountriesTranslation::count();

            if ($count != 0) {
                $deletedFiles = CountriesTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> countries translations ");
            }
            //Function to get the data from API and then insert it into the table countries translations
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> countries translations');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $key['language_country'] = $API_LANGUAGE;
                    $isValid = $destination->insertCountriesTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $isValid);
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }




    /**
     * This function is designed to synchronize the Regions data with an external API.
     * It clears the current Regions data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchRegions()
    {
        $API_NAME = "regions";
        try {
            //Function to get all the entries from the table country and then empty  the table
            $count = Region::count();
            if ($count != 0) {
                $deletedFiles = Region::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Regions ");
            }
            //Function to get the data from API and then insert it into the table country
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> Regions ');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
                    $isValid = $destination->insertRegion($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' .  $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }




    /**
     * This function is designed to synchronize the Regions Translation data with an external API.
     * It clears the current Regions translation data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchRegionsTranslation()
    {
        $API_NAME = "regions/translations";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table regions translations and then empty  the table
            $count = RegionsTranslation::count();

            if ($count != 0) {
                $deletedFiles = RegionsTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Regions translations ");
            }
            //Function to get the data from API and then insert it into the table region translations
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> regions translations');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $key['language_country'] = $API_LANGUAGE;
                    $isValid = $destination->insertRegionTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $isValid);
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }



    /**
     * This function is designed to synchronize the Destinations data with an external API.
     * It clears the current Destinations data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchDestinations()
    {
        $API_NAME = "destinations";
        try {
            //Function to get all the entries from the table Destinations and then empty  the table
            $count = Destination::count();
            if ($count != 0) {
                $deletedFiles = Destination::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Destinations ");
            }
            //Function to get the data from API and then insert it into the table Destinations
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> Destinations ');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $key['updated_at'] = Carbon::parse($key['updated_at'])->format('Y-m-d H:i:s');
                    $isValid = $destination->insertDestination($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' .  $response->status());
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }


    /**
     * This function is designed to synchronize the Destinations Translation data with an external API.
     * It clears the current Destinations translation data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchDestinationsTranslation()
    {
        $API_NAME = "destinations/translations";
        $API_LANGUAGE = "fr";
        try {
            //Function to get all the entries from the table Destinations translations and then empty  the table
            $count = DestinationsTranslation::count();

            if ($count != 0) {
                $deletedFiles = DestinationsTranslation::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> Destinations translations ");
            }
            //Function to get the data from API and then insert it into the table Destinations translations
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME . '/?language_code=' . $API_LANGUAGE);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully  -> Destinations translations');
                foreach ($data as $key) {
                    $destination = new DestinationController;
                    $key['language_country'] = $API_LANGUAGE;
                    $isValid = $destination->insertDestinationTranslation($key);
                    if ($isValid) {
                        Log::info('Data inserted successfully');
                    } else {
                        Log::error('Data insertion failed:' . $isValid);
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }



    /**
     * This function is designed to synchronize the destinations has regions data with an external API.
     * It clears the current destinations has regions theme data from the database and fetches the updated data from the API.
     *
     * @return void
     *
     * @throws \Exception If an error occurs during the process
     */
    public function clearAndFetchDestinationHasRegions()
    {
        $API_NAME = "destinations";
        try {
            //Function to get all the entries from the destination has region and then empty  the table
            $count = DestinationHasRegions::count();
            if ($count != 0) {
                $deletedFiles = DestinationHasRegions::query()->delete();
                log::info($deletedFiles . " -> Records deleted successfully -> destination has regions  ");
            }
            //Function to get the data from API and then insert it into the table destination has region
            $response = Http::get($this->URL_PROVIDER_API . $API_NAME);

            if ($response->successful()) {
                $data = $response->json();
                Log::info('Data retrieved successfully -> destination has regions');

                foreach ($data as $key) {
                    $hotel  = new DestinationController;
                    $code   = $key['code'];
                    $regions = data_get($key, 'regions');
                    $data_destination['destinations_code'] = $code;
                    //validate that region exists
                    if (isset($regions)) {
                        foreach($regions as $region) {
                            $data_destination['regions_code'] = $region;
                            $isValid = $hotel->insertDestinationsHasRegions($data_destination);
                            if ($isValid) {
                                Log::info('Data inserted successfully');
                            } else {
                                Log::error('Data insertion failed:' . $response->status());
                            }
                        }
                    } else {
                        Log::info('Regions does not exist');
                        return false;
                    }
                }
            } else {
                Log::error('Request failed with status code: ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::critical($e->getMessage());
        }
    }
}
