<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Models\Post;

class Comment extends Model
{
    protected $table="comments";

    public function post(){
        $id=$this->attributes['posts_id'];
        return Post::all()->where('id','=',$id)->first();
    }
    public function user(){
        return User::Where('id','=',$this->attributes['user_id'])->first();
    }
}
