<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'slug','faqs_id','qustion','answer','approve','status',
    ];

    public function faqparent()
    {
        return $this->belongsTo('App\Faqparent','faqs_id');
    }
}
