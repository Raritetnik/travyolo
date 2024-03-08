<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
      protected $fillable = [
        'code',
        'master',
        'name',
        'zipcode',
        'address',
        'latitude',
        'longitude',
        'stars',
        'nr_rooms',
        'nr_restaurants',
        'nr_bars',
        'nr_halls',
        'yearbuilt',
        'checkin_from',
        'checkout_to',
        'checkout_from',
        'checkin_to',
        'room_amenity',
        'gmt_offset',
        'email',
        'phone',
        'currencycode',
        'availability_score',
        'hotel_score',
        'book_score',
        'hotel_information',
        'hotel_introduction',
        'location_information',
        'attraction_information',
        'hotel_amenity',
        'destinations_code',
        'hotel_types_code',
        'updated_at',
    ];
    public $timestamps = false;
    protected $primaryKey = 'code';
    public $incrementing = false;
}
