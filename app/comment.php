<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //Relation with posts $comment->post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
