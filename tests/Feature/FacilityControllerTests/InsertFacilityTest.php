<?php

namespace Tests\Feature;

use App\Http\Controllers\FacilityController;
use App\Models\Facility;
use App\Models\FacilityCategory;
use App\Models\FacilityScope;
use App\Models\FacilityTheme;
use App\Models\FacilityType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InsertFacilityTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Function that test the insertFacility method in the FacilityController
     * @return bool
     */
    public function testInsertFacility(){
        $facilityType = FacilityType::factory()->create();
        $category = FacilityCategory::factory()->create();
        $scope = FacilityScope::factory()->create();
        $data = [
            "code"                     => rand(1,10),
            "name"           => "Insert ".rand(1,10),
            "facility_type"  => $facilityType->code,
            "category"       => $category->code,
            "scope"          => $scope->code,
            "updated_at"     => now()
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacility($data);
        $this->assertTrue($status);
     
    }

  

    /**
     * Function that test the insertFacilityTranslation method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityTranslation(){
        $facility = Facility::factory()->create();
        $data = [
            "language_country"  => 'fr',
            "name"              => "Translation ".rand(1,10),
            "code"              => $facility->code,
            "updated_at"        => now()
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilityCategory method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityCategory(){
        $data = [
            "code"        => rand(1,10),
            "name"        => "Insert ".rand(1,10),
            "updated_at"  => now()
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityCategory($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilityCategoryTranslation method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityCategoryTranslation(){
        $facilityCategory = FacilityCategory::factory()->create();
        $data = [
            'language_country'  => 'fr',
            'name'              => "Translation ".rand(1,10),
            'code'              => $facilityCategory->code,
            'updated_at'        => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityCategoryTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilityScope method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityScope(){
        $data = [
            "code"         => rand(1,10),
            "name"         => "Insert ".rand(1,10),
            "updated_at"   => now()
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityScope($data);
        $this->assertTrue($status);
    }

        /**
     * Function that test the insertFacilityScopeTranslation method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityScopeTranslation(){
        $facilityScope = FacilityScope::factory()->create();
        $data = [
            'language_country'      => 'fr',
            'name'                  => "Translation ".rand(1,10),
            'code'                  => $facilityScope->code,
            'updated_at'            => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityScopeTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilityTheme method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityTheme(){
        $data = [
            "code"       => rand(1,10),
            "name"       => "Insert ".rand(1,10),
            "updated_at" => now()
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityTheme($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilityThemeTranslation method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityThemeTranslation(){
        $facilityTheme = FacilityTheme::factory()->create();
        $data = [
            'language_country'      => 'fr',
            'name'                  => "Translation ".rand(1,10),
            'code'                  =>  $facilityTheme->code,
            'updated_at'            => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityThemeTranslation($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilitiesHasFacilityTheme method in the FacilityController
     * @return bool
     */
    public function testInsertFacilitiesHasFacilityTheme(){
        $facility = Facility::factory()->create();
        $facilityTheme = FacilityTheme::factory()->create();
        $data = [
            'facilities_code'      => $facility->code,
            'facility_themes_code' => $facilityTheme->code,
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilitiesHasFacilityTheme($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilityTheme method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityType(){
        $data = [
            "code"       => rand(1,10),
            "name"       => "Insert ".rand(1,10),
            "updated_at" => now()
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityType($data);
        $this->assertTrue($status);
    }

    /**
     * Function that test the insertFacilityScopeTranslation method in the FacilityController
     * @return bool
     */
    public function testInsertFacilityTypeTranslation(){
        $facilityType = FacilityType::factory()->create();
        $data = [
            'language_country'  => 'fr',
            'name'              => "Translation ".rand(1,10),
            'code'              => $facilityType->code,
            'updated_at'        => now(),
        ];

        $controller = new FacilityController;
        $status = $controller->insertFacilityTypeTranslation($data);
        $this->assertTrue($status);
    }
}
