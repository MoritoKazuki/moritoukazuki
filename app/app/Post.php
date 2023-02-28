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
        'del_flg',
        'image', 
        'episode',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function likes() {
        return $this->belongsToMany('App\like');
    }
    
}
