<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    //
    protected $fillable = [
        'title',
        'pet',
        'date',
        'category_id',
        'image', 
        'episode',
    ];

    public function category() {
        return $this->belongsTo('App\Category','category_id','id');
    }
    
}
