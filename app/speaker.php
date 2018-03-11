<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class speaker extends Model
{
    //
    protected $table="speakers";

    /**
     * The event they talk in.
     */
    public function SpeakerInEvent()
    {
        return $this->belongsToMany('App\SpeakerInEvent');
    }
}
