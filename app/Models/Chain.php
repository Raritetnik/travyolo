<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string, date>
    */
    protected $fillable = [
        'code',
        'name',
        'updated_at',
    ];
    protected $primaryKey = 'code';
    public $timestamps = false;
    public $incrementing = false;
}
