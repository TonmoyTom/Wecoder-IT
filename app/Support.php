<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'slug','support','facebook','twitter','linkdin','googleplus','github','status','approve'
    ];
}
