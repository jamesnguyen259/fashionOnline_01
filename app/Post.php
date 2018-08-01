<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamp = true;

    public function comment()
    {
        return $this->morphMany('App\Comment', 'object');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongstoMany('App\Category', 'category_id', 'post_id');
    }
}
