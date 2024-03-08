<?php

namespace App\Http\Controllers;

use App\Jobs\GetData;
use App\Models\Facility;
use App\Models\FacilitiesTranslation;
use App\Models\FacilityCategory;
use App\Models\FacilityCategoriesTranslation;
use App\Models\FacilityScope;
use App\Models\FacilityScopesTranslation;
use App\Models\FacilityTheme;
use App\Models\FacilityThemesTranslation;
use App\Models\FacilityType;
use App\Models\FacilityTypesTranslation;
use App\Models\FacilitiesHasFacilityTheme;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FacilityController extends Controller
{


    /**
     * Function for insert the data in the Facility Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacility($data){

        try{
            Facility::create([
                'code'                     => $data['code'],
                'name'                     => $data['name'],
                'updated_at'               => now(),
                'facility_types_code'      => $data['facility_type'],
                'facility_categories_code' => $data['category'],
                'facility_scopes_code'     => $data['scope'],
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the Facility Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacility( $data){

        try{
            $facility = Facility::where('code', $data['code'])->first();

            if(isset($facility)){
                $facility->update([
                    //'code'                          => $data['code'],
                    'name'                          => $data['name'],
                    'updated_at'                    => now(),
                    'facility_types_code'           => $data['facility_types'],
                    'facility_categories_code'      => $data['category'],
                    'facility_scopes_code'          => $data['scope'],
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the Facility Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacility($data){

        try{
            $facility = Facility::where('code', $data['code'])->first();

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }

    }


    /**
     * Function for insert the data in the FacilitiesTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityTranslation($data){

        try{
            FacilitiesTranslation::create([
                'language_country' => $data['language_country'],
                'name'             => $data['name'],
                'facilities_code'  => $data['code'],
                'updated_at'       => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilitiesTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityTranslation($data){

        try{
            $facilityTranslation = FacilitiesTranslation::where('facilities_code', $data['code'])
            ->where('language_country', $data['language_country'])->first();

            if(isset($facilityTranslation)){
                $facilityTranslation->update([
                    'language_country' => $data['language_country'],
                    'name'             => $data['name'],
                    'facilities_code'  => $data['code'],
                    'updated_at'       => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilitiesTranslation Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityTranslation($data){

        try{
            $facility = FacilitiesTranslation::where('facilities_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }



    /**
     * Function for insert the data in the facilityCategory Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityCategory($data){

        try{
            FacilityCategory::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilityCategory Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityCategory( $data){

        try{
            $facilityCategory = FacilityCategory::where('code', $data['code'])->first();

            if(isset($facilityCategory)){
                $facilityCategory->update([
                    //'code'       => $data['code'],
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilityCategory Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityCategory($data){
        try{
             $facility = FacilityCategory::where('code', $data['code'])->first();

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }


    /**
     * Function for insert the data in the FacilityCategoriesTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityCategoryTranslation($data){

        try{
            FacilityCategoriesTranslation::create([
                'language_country'         => $data['language_country'],
                'name'                     => $data['name'],
                'facility_categories_code' => $data['code'],
                'updated_at'               => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilityCategoriesTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityCategoryTranslation($data){

        try{
            $facilityCategoryTranslation = FacilityCategoriesTranslation::where('facility_categories_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facilityCategoryTranslation)){
                $facilityCategoryTranslation->update([
                    'language_country'          => $data['language_country'],
                    'name'                      => $data['name'],
                    'facility_categories_code'  => $data['code'],
                    'updated_at'                => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilityCategoriesTranslation Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityCategoryTranslation($data){

        try{
            $facility = FacilityCategoriesTranslation::where('facility_categories_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }



    /**
     * Function for insert the data in the facilityScope Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityScope($data){

        try{
            FacilityScope::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilityScope Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityScope( $data){

        try{
            $facilityScope = FacilityScope::where('code', $data['code'])->first();

            if(isset($facilityScope)){
                $facilityScope->update([
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilityScope Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityScope($data){

        try{
            $facility = FacilityScope::where('code', $data['code'])->first();

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }



     /**
     * Function for insert the data in the facilityTheme Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
     public function insertFacilityTheme($data){

        try{
            FacilityTheme::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilityTheme Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityTheme( $data){

        try{
            $facilityTheme = FacilityTheme::where('code', $data['code'])->first();

            if(isset($facilityTheme)){
                $facilityTheme->update([
                    //'code'       => $data['code'],
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

     /**
     * Function for delete the data in the FacilityTheme Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityTheme($data){

        try{
             $facility = FacilityTheme::where('code', $data['code'])->first();

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

     /**
     * Function for insert the data in the facilityThemeTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityThemeTranslation($data){

        try{
            FacilityThemesTranslation::create([
                'language_country'     => $data['language_country'],
                'name'                 => $data['name'],
                'facility_themes_code' => $data['code'],
                'updated_at'           => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilityThemesTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityThemeTranslation($data){

        try{
            $facilityThemeTranslation = FacilityThemesTranslation::where('facility_themes_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facilityThemeTranslation)){
                $facilityThemeTranslation->update([
                    'language_country'       => $data['language_country'],
                    'name'                   => $data['name'],
                    'facility_themes_code'   => $data['code'],
                    'updated_at'             => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilityThemesTranslation Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityThemeTranslation($data){

        try{
            $facility = FacilityThemesTranslation::where('facility_themes_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

     /**
     * Function for insert the data in the facilityScopeTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityScopeTranslation($data){

        try{
            FacilityScopesTranslation::create([
                'language_country'     => $data['language_country'],
                'name'                 => $data['name'],
                'facility_scopes_code' => $data['code'],
                'updated_at'           => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilityScopesTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityScopeTranslation($data){

        try{
            $facilityScopeTranslation = FacilityScopesTranslation::where('facility_scopes_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facilityScopeTranslation)){
                $facilityScopeTranslation->update([
                    'language_country'       => $data['language_country'],
                    'name'                   => $data['name'],
                    'facility_scopes_code'   => $data['code'],
                    'updated_at'             => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilityScopesTranslation Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityScopeTranslation($data){

        try{
            $facility = FacilityScopesTranslation::where('facility_scopes_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }


    /**
     * Function for insert the data in the FacilitiesHasFacilityTheme Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilitiesHasFacilityTheme($data){

        try{
            FacilitiesHasFacilityTheme::create([
                'facilities_code'      => $data['facilities_code'],
                'facility_themes_code' => $data['facility_themes_code'],
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilitiesHasFacilityTheme Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilitiesHasFacilityTheme($data){

        try{
            $facilitiesHasFacilityTheme = FacilitiesHasFacilityTheme::where('facilities_code', $data['facilities_code'])
            ->where('facility_themes_code', $data['facility_themes_code'])->first();

            if(isset($facilitiesHasFacilityTheme)){
                $facilitiesHasFacilityTheme->update([
                    'facilities_code'      => $data['facilities_code'],
                    'facility_themes_code' => $data['facility_themes_code'],
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilitiesHasFacilityTheme Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilitiesHasFacilityTheme($data){
        try{
            $facilitiesHasFacilityTheme = FacilitiesHasFacilityTheme::where('facilities_code', $data['facilities_code'])
            ->where('facility_themes_code', $data['facility_themes_code'])->first();

            if(isset($facilitiesHasFacilityTheme)){
                $facilitiesHasFacilityTheme->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }



    /**
     * Function for insert the data in the facilityType Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityType($data){

        try{
            FacilityType::create([
                'code'       => $data['code'],
                'name'       => $data['name'],
                'updated_at' => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for update the data in the FacilityType Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityType( $data){

        try{
            $facilityType = FacilityType::where('code', $data['code'])->first();

            if(isset($facilityType)){
                $facilityType->update([
                    //'code'       => $data['code'],
                    'name'       => $data['name'],
                    'updated_at' => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilityType Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityType($data){

        try{
            $facility = FacilityType::where('code', $data['code'])->first();

            if(isset($facility)){
            $facility->delete();
            return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }


    /**
     * Function for insert the data in the facilityTypeTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully inserted, false otherwise.
     */
    public function insertFacilityTypeTranslation($data){

        try{
            FacilityTypesTranslation::create([
                'language_country'    => $data['language_country'],
                'name'                => $data['name'],
                'facility_types_code' => $data['code'],
                'updated_at'          => now(),
            ]);
            return true;
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }
    /**
     * Function for update the data in the FacilityTypesTranslation Model(Database)
     * @param array $data - An associative array containing information to be inserted in the DB.
     * @return bool - Returns true if the data was successfully updated, false otherwise.
     */
    public function updateFacilityTypeTranslation($data){

        try{
            $facilityTypeTranslation = FacilityTypesTranslation::where('facility_types_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facilityTypeTranslation)){
                $facilityTypeTranslation->update([
                    'language_country'    => $data['language_country'],
                    'name'                => $data['name'],
                    'facility_types_code' => $data['code'],
                    'updated_at'          => now(),
                ]);
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
            return false;
        }
    }

    /**
     * Function for delete the data in the FacilityTypesTranslation Model(Database)
     * @param array $data - Primary key
     * @return bool - Returns true if the data was successfully deleted, false otherwise.
     */
    public function deleteFacilityTypeTranslation($data){

        try{
            $facility = FacilityTypesTranslation::where('facility_types_code', $data['code'])
            ->where('language_country', $data['language_country'])->first() ;

            if(isset($facility)){
                $facility->delete();
                return true;
            } else{
                return false;
            }
        } catch(\Exception $e){
            Log::error("Exception : ". $e->getMessage());
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
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
