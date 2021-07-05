<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','approve','status',
    ];

    public function Subcategory()
    {
        return $this->hasMany(Subcategory::class,'category_id');
        // note: we can also include comment model like: 'App\Models\Comment'
    }

    public function post()
    {
        return $this->hasMany(Post::class);
        // note: we can also include comment model like: 'App\Models\Comment'
    }

    public function Admission()
    {
        return $this->hasMany(Adform::class);
        // note: we can also include comment model like: 'App\Models\Comment'
    }
}
