<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The RegionsTranslation represents a translation for a region.
 * It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes:
 * - language_country: The language and country code (e.g., 'fr_FR') for the translation.
 * - name : the translated name of the region.
 * - regions_code : The unique identifier for the related regions
 * - updated_at: The timestamp when the regions_translations information was last updated from the API
 */

class RegionsTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;
    protected $fillable = [
        'language_country',
        'name',
        'regions_code',
        'updated_at'

    ];
    public $timestamps = false;

    protected $primaryKey = ['language_country', 'regions_code'];
    public $incrementing = false;
}
