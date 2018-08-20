<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamp = true;

    public function object()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
