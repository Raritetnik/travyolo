<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'updated_at',
        'facility_types_code',
        'facility_categories_code',
        'facility_scopes_code',
    ];
    public $timestamps = false;

    protected $primaryKey = 'code';
    public $incrementing = false;
}
