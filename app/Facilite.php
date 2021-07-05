<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facilite extends Model
{
    protected $fillable = [
        'name','slug','imagename','detalis','approve','status',
    ];
}
