<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $fillable = [
        'category_id','name','slug','approve','status',
    ];



    public function category()
    {
        return $this->belongsTo(Category::class);
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
