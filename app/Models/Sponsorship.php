<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sponsorship extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='sponsorships';

    protected $primaryKey = 'sponsorship_id';

    protected $fillable = ['sponsorship_id','event_id','sponser_id','created_at','updated_at','deleted_at'];
}
