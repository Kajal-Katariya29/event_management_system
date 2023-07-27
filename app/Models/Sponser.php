<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponser extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='sponsers';

    protected $primaryKey = 'sponser_id';

    protected $fillable = ['sponser_id','sponser_name','sponser_level','contact_info','created_at','updated_at','deleted_at'];
}
