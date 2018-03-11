<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class club extends Model
{
    //
    protected $table="clubs";

    /**
     * Get the bureauClub members.
     */
    public function bureauClub()
    {
        return $this->hasMany('App\bureauClub');
    }

    /**
     * Get the events of the club.
     */
    public function clubAndEvent()
    {
        return $this->hasMany('App\clubAndEvent');
    }
}
