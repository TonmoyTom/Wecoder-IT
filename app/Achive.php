<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achive extends Model
{
    protected $fillable = [
        'name','slug','shottitle','approve','status',
    ];
}
