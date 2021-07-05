<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'slug','aboutsdetalis','approve','status',
    ];
}
