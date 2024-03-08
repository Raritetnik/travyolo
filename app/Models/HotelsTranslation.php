<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      protected $fillable = [
        'language_country',
        'hotel_information',
        'hotel_introduction',
        'location_information',
        'attraction_information',
        'hotel_amenity',
        'hotels_code',
        'updated_at'
    ];
    
    public $timestamps = false;
    protected $primaryKey = ['language_country', 'hotels_code'];
    public $incrementing = false;
}
