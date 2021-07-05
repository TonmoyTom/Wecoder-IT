<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{

    use  Notifiable;

    protected $fillable = [
        'name','slug','category_id','subcategory_id','imagename','shottitle','longtitle','front','view_count','approve','status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class );
    }

}
