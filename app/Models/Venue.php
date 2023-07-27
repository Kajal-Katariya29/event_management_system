<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='venues';

    protected $primaryKey = 'venue_id';

    protected $fillable = ['venue_id','country_id','city_id','venue_name','capacity','address','pin_code','created_at','updated_at','deleted_at'];
}
