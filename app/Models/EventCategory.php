<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCategory extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='event_categories';

    protected $primaryKey = 'event_category_id';

    protected $fillable = ['event_category_id','name','created_at','updated_at','deleted_at'];
}
