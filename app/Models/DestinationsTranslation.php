<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * The DestinationsTranslation represents a translation  for a destinations.
 *  It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes:
 * - language_country: The language and country code (e.g., 'fr_FR') for the translation.
 * - name : the translated name of the destination.
 * - destinations_code: The unique identifier for the related destination.
 * - updated_at: The timestamp when the destinations_translations information was last updated from the API
 *
 */
class DestinationsTranslation extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;
    protected $fillable = [
        'language_country',
        'name',
        'destinations_code',
        'updated_at'
    ];
    public $timestamps = false;

    protected $primaryKey = ['language_country', 'destinations_code'];
    public $incrementing = false;
}
