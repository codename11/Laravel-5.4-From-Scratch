<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*Ovim je dozvoljen upis u navedena polja 
    prilikom mass-assigment-a.*/
    protected $fillable = [
        'title', 
        'body'
    ];

    /*Ovim se navodi da u ovim poljima 
    nije dozvoljen upis prilikom mass-assigment-a.*/
    protected $guarded = ["user_id"];
}
