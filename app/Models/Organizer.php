<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organizer extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='organizers';

    protected $primaryKey = 'organizer_id';

    protected $fillable = ['organizer_id','name','contact_email','contact_phone','created_at','updated_at','deleted_at'];

}
