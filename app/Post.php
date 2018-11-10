<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /*Ovim je dozvoljen upis u navedena polja u bazi
    prilikom mass-assigment-a.*/
    protected $fillable = [
        'title', 
        'body',
        "user_id"
    ];

    /*Ovim se navodi da u ovim poljima 
    nije dozvoljen upis prilikom mass-assigment-a.*/
    //protected $guarded = ["user_id"];

    /*Ovime se povezuje svaki pojedinacni komentar 
    sa id-jem nekog posta.*/
    public function comments(){
        return $this->hasMany(Comment::class);
        /*Gornje i donje su isto.*/ 
        //return $this->hasMany("App\Comment");
    }
}
