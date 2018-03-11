<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpeakerInEvent extends Model
{
    //
    protected $table="speakerinevents";

    /**
     * The speakers that belong to the event.
     */
    public function speaker()
    {
        return $this->belongsToMany('App\speaker');
    }

    /**
     * The event .
     */
    public function Events()
    {
        return $this->belongsToMany('App\Events');
    }
}
