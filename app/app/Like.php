<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function posts() {
        return $this->belongsTo('App\Post');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function like_exist($user_id,$item_id) {
        return $this->where('user_id',$user_id)->where('post_id',$item_id)->exists();
       
    }

}
