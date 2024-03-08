<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The Continent class represents a continent.
 * It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes :
 * - code : Code of the continent.
 * - name: Name of the continent.
 * - updated_at: The timestamp when the continent information was last updated from the API
 *
 */

class Continent extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'updated_at',


    ];

    protected $primaryKey = 'code';
    public $incrementing = false;
    public $timestamps = false;
}
