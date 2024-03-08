<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * The MealType class represents a type of meal within the hotel.
 * It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes :
 * - code: Code of the type of meal.
 * - name: name of the type of meal.
 * - score: A numeric value representing the  quality of the meal type.
 * - updated_at: The timestamp when the continent information was last updated in the database.
 */
class MealType extends Model
{
    use HasFactory;

    protected $fillable = [

        'code',
        'name',
        'score',
        'updated_at'

    ];

    public $timestamps = false;

    protected $primaryKey = 'code';
    public $incrementing = false;
}
