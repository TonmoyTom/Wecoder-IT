<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faqparent extends Model
{
    protected $fillable = [
        'slug','faqtitle','approve','status',
    ];

    public function faq()
    {
        return $this->hasMany(Faq::class, 'faqs_id');
        // note: we can also include comment model like: 'App\Models\Comment'
    }
}
