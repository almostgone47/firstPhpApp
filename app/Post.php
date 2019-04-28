<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'is_active', 'body', 'photo_id', 'category_id'];

    public function category(){

        return $this->belongsTo('App\Category');

    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function comments(){

        return $this->hasMany('App\Comment');

    }

}
