<?php

namespace App\Models;

use App\Traits\HasCompositePrimaryKeyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string, date>
    */
    protected $fillable = [
        'code',
        'name',
        'updated_at',
    ];
    public $timestamps = false;

    protected $primaryKey = 'code';
    public $incrementing = false;
}
