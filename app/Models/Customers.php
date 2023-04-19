<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customers extends Model
{
    use HasFactory;
    use SoftDeletes;

    //make member function of tables
    protected $table = "customers";
    protected $primaryKey = "customer_id";    

    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value); // UPPERCASE WORD
    }
    public function getDobAttributes($value){
        return date('d-M-Y', strtotime($value));
    }
}
 