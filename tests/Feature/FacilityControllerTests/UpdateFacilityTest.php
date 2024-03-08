<?php

namespace Tests\Feature;

use App\Http\Controllers\FacilityController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Facility;
use App\Models\FacilitiesTranslation;
use App\Models\FacilityCategory;
use App\Models\FacilityCategoriesTranslation;

use App\Models\FacilityScope;
use App\Models\FacilityScopesTranslation;
use App\Models\FacilityType;
use App\Models\FacilityTypesTranslation;
use App\Models\FacilityTheme;
use App\Models\FacilityThemesTranslation;
use Tests\TestCase;

class UpdateFacilityTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Function that test the updateFacility method in the FacilityController
     * @return bool
     */
    public function testUpdateFacility(){
        // Create new instances of dependencies
        $facility = Facility::factory()->create();

        $data = [
            "code"             => $facility->code, // Use the code of the created facility
            "name"             => "Update ".rand(1,10),
            "facility_types"    => $facility->facility_types_code, // Use the code of the created facility type
            "category"         => $facility->facility_categories_code, // Use the code of the created category
            "scope"            => $facility->facility_scopes_code, // Use the code of the created scope
            "updated_at"       => now()
            ];

        $controller = new FacilityController;
        $status = $controller->updateFacility($data);
        $this->assertTrue($status);
    }

      /**
     * Function that test the testUpdateFacilityTranslation method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityTranslation(){
        $facilityTranslation = FacilitiesTranslation::factory()->create();
        $data = [
            "language_country"  => $facilityTranslation->language_country,
            "name"              => "Translation ".rand(1,10),
            "code"              => $facilityTranslation->facilities_code,
            "updated_at"        => now()
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityTranslation($data);
        $this->assertTrue($status);
    }




    /**
     * Function that test the updateFacilityCategory method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityCategory(){
        $facilityCategory = FacilityCategory::factory()->create();
        $data = [
            "code"         =>  $facilityCategory->code,
            "name"         => "Update ".rand(1,10),
            "updated_at"   => now()
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityCategory($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the updateFacilityCategoryTranslation method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityCategoryTranslation(){
        $facilityCategoriesTranslation = FacilityCategoriesTranslation::factory()->create();
        $data = [
            'language_country'   => $facilityCategoriesTranslation->language_country,
            'name'               => "Translation ".rand(1,10),
            'code'               => $facilityCategoriesTranslation->facility_categories_code,
            'updated_at'         => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityCategoryTranslation($data);
        $this->assertTrue($status);
    }



     /**
     * Function that test the updateFacilityScope method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityScope(){
        $facilityScope = FacilityScope::factory()->create();
        $data = [
            "code"          => $facilityScope->code,
            "name"          => "Update ".rand(1,10),
            "updated_at"    => now()
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityScope($data);
        $this->assertTrue($status);
    }

     /**
     * Function that test the updateFacilityScopeTranslation method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityScopeTranslation(){
        $facilityScopesTranslation = FacilityScopesTranslation::factory()->create();
        $data = [
            'language_country'   => $facilityScopesTranslation->language_country,
            'name'               => "Translation ".rand(1,10),
            'code'               => $facilityScopesTranslation->facility_scopes_code,
            'updated_at'         => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityScopeTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the updateFacilityTheme method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityTheme(){
        $facilityTheme = FacilityTheme::factory()->create();
        $data = [
            "code"          => $facilityTheme->code,
            "name"          => "Update ".rand(1,10),
            "updated_at"    => now()
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityTheme($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the updateFacilityThemeTranslation method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityThemeTranslation(){
        $facilityThemesTranslation = FacilityThemesTranslation::factory()->create();
        $data = [
            'language_country'   => $facilityThemesTranslation->language_country,
            'name'               => "Translation ".rand(1,10),
            'code'               => $facilityThemesTranslation->facility_themes_code,
            'updated_at'         => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityThemeTranslation($data);
        $this->assertTrue($status);
    }


    /**
     * Function that test the updateFacilityTheme method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityType(){
        $facilityType = FacilityType::factory()->create();
        $data = [
            "code"          => $facilityType->code,
            "name"          => "Update ".rand(1,10),
            "updated_at"    => now()
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityType($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the updateFacilityScopeTranslation method in the FacilityController
     * @return bool
     */
    public function testUpdateFacilityTypeTranslation(){
        $facilityTypesTranslation = FacilityTypesTranslation::factory()->create();
        $data = [
            'language_country'   => $facilityTypesTranslation->language_country,
            'name'               => "Translation ".rand(1,10),
            'code'               => $facilityTypesTranslation->facility_types_code,
            'updated_at'         => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->updateFacilityTypeTranslation($data);
        $this->assertTrue($status);
    }
}
