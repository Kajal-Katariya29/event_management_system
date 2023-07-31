<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\EventMedia;

class Event extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='events';

    protected $primaryKey = 'event_id';

    protected $fillable = ['event_id','name','description','event_category_id','organizer_id','venue_id','start_date','end_date','registration_deadline','status','created_at','updated_at','deleted_at'];

    /**
     * Get all of the eventMedia for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventMedia(): HasMany
    {
        return $this->hasMany(EventMedia::class, 'event_id', 'event_id');
    }

    /**
     * Get all of the sponsers for the Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sponsers(): HasMany
    {
        return $this->hasMany(Sponsorship::class, 'event_id', 'event_id');
    }
}


