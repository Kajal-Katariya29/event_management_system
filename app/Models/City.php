<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='cities';

    protected $primaryKey = 'city_id';

    protected $fillable = ['city_id','country_id','name','created_at','updated_at','deleted_at'];
}
