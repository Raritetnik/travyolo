<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The RoomTypesTranslation class represents a translation for a room type.
 * It extends the model class uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes :
 * - language_country: The language and country code (e.g., 'fr_FR') for the translation.
 * - name: the translated name of room type.
 * - room_types_code: The unique identifier for the related room type
 * - updated_at: The timestamp when the countries_translations information was last updated from the API.
 */
class RoomTypesTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

    protected $fillable = [
       'language_country',
       'name',
       'room_types_code',
       'updated_at'

   ];

   public $timestamps = false;

   protected $primaryKey = ['language_country', 'room_types_code'];
   public $incrementing = false;
}
