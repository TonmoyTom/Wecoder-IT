<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adform extends Model
{
    protected $fillable = [
        'student_name','mother_name','father_name','present_address','permant_address','ssc','sscyear','hsc','hscyear','office_address','nationalid','occpation','year','country','gender','phone','email','gradiuannmber','guradianrltn','refname','refphone','batch','retnstudent',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
