<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventMedia extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='event_media';

    protected $primaryKey = 'event_media_id';

    protected $fillable = ['event_media_id','event_id','media_name','media_type','media_path','created_at','updated_at','deleted_at'];
}
