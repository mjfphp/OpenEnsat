<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table="events";

    /**
     * The event they talk in.
     */
    public function SpeakerInEvent()
    {
        return $this->belongsToMany('App\SpeakerInEvent');
    }

    /**
     * The club that is organizing the event.
     */
    public function clubAndEvent()
    {
        return $this->belongsToMany('App\clubAndEvent');
    }
}
