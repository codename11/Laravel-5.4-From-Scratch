<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*public function incomplete(){
        return Task::where("completed",0)->get();
    }*/

    public function scopeIncomplete($query){
        return $query->where("completed",0);
    }
}
