<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*Ovim je dozvoljen upis u navedena polja 
    prilikom mass-assigment-a.*/
    protected $fillable = [
        "post_id",
        'body',
        "user_id"
    ];

    /*Ovim se navodi da u ovim poljima 
    nije dozvoljen upis prilikom mass-assigment-a.*/
    //protected $guarded = ["user_id"];

    //Comment->post
    /*Nalazenje posta za neki komentar.*/
    public function post(){// $comment->post->user
        return $this->belongsTo(Post::class);
    }

    public function user(){// $comment->user->name
        return $this->belongsTo(User::class);
    }
}
