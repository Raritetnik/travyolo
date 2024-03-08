<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityCategory extends Model
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
  ];

  public $timestamps = false;

  protected $primaryKey = 'code';
  public $incrementing = false;
}
