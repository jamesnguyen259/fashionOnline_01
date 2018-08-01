<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table = 'category_posts';
    public $timestamp = true;

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
}
