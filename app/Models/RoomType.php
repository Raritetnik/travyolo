<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The RoomType class represents a type of room within the hotel.
 *  It extends the Model class and uses the HasFactory to create instances of your models with fake data for testing.
 *
 * This class has the following fillable attributes :
 * - code : code of the Type of the bed.
 * - quantity : number of occupants for bed.
 * - name : name of the bed.
 * - updated_at : The timestamp when the continent information was last updated in the database.
 */
class RoomType extends Model
{
    use HasFactory;
    protected $fillable = [
       'code',
       'quantity',
       'name',
       'updated_at'

   ];

   public $timestamps = false;

   protected $primaryKey = 'code';
    public $incrementing = false;
}
