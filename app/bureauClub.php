<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bureauClub extends Model
{
    //
    protected $table="bureauclubs";

    /**
     * Get the club.
     */
    public function club()
    {
        return $this->belongsTo('App\club');
    }
}
