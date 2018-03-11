<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clubAndEvent extends Model
{
    //
    protected $table="clubandevents";

    /**
     * Get the club.
     */
    public function club()
    {
        return $this->belongsTo('App\club');
    }

    /**
     * The event .
     */
    public function Events()
    {
        return $this->belongsToMany('App\Events');
    }
}
