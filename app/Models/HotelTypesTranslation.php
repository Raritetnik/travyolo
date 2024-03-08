<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelTypesTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string, string, date>
    */
    protected $fillable = [
        'language_country',
        'name',
        'hotel_types_code',
        'updated_at',
    ];
    public $timestamps = false;

    protected $primaryKey = ['language_country', 'hotel_types_code'];
    public $incrementing = false;
}
