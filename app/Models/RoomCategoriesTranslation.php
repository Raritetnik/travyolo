<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategoriesTranslation extends Model
{
    use HasCompositePrimaryKeyTrait;
    use HasFactory;

    protected $fillable = [
        'language_country',
        'name',
        'updated_at',
        'room_categories_code'
    ];

    public $timestamps = false;

    protected $primaryKey = ['language_country', 'room_categories_code'];
    public $incrementing = false;
}
