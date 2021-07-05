<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Counsell extends Model
{
    protected $fillable = [
        'name','email','phone','status',
    ];
}
