<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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

    public function scopeFilter($query,$filters){
        if(isset($filters["month"])){
            $query->whereMonth("created_at",Carbon::parse($filters["month"])->month);
        }

        if(isset($filters["year"])){
            $query->whereYear("created_at",Carbon::parse($filters["year"]));
        }
    }

    public static function archives(){

        return static::selectRaw("year(created_at) as year, monthname(created_at) as month, count(*) as published")
        ->groupBy("year","month")
        ->orderByRaw("min(created_at) desc")
        ->get()
        ->toArray();

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
