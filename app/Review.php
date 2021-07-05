<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   
    protected $fillable = [
        'link','slug','approve','status','count'
    ];
}
