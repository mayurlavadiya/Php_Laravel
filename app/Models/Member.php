<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = "member_id";

    // function getGroup(){
    //     return $this->hasOne('App\Models\Group','group_id'); // one to one relation so use hasOne function with 2 args
    // }

    function group(){
            return $this->hasMany('App\Models\Group','group_id','group_id'); // one to many relation so use hasMany function with 2 args
        } 
}
