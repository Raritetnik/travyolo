<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelsHasHotelTheme extends Model
{
    use HasFactory;
    use HasCompositePrimaryKeyTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
    */
    protected $fillable = [
        'hotels_code',
        'hotel_themes_code',
    ];
    
    public $timestamps = false;
    protected $primaryKey = ['hotels_code', 'hotel_themes_code'];
    public $incrementing = false;
}
