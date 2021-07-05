<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactmsg extends Model
{
    protected $fillable = [
        'address','phone1','phone2','email','email2','detalis','approve','status',
    ];
}
