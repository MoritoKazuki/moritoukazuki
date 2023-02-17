<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category'];

    public function Post() {
        return $this->hasMany('App\Post');
    }
}
