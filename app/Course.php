<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Post;

class Course extends Model
{
    protected $table="courses";

    public function posts()
    {
        $id=$this->attributes['id'];
        return Post::all()->where('course_id','=',$id);
    }
}
