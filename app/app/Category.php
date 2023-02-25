<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Category extends Model
{
    protected $fillable = ['category'];

    public function Post() {
        return $this->hasMany('App\Post');
    }
}
