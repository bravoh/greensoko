<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function cat(){
        return $this->belongsTo(Category::class,'category');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
