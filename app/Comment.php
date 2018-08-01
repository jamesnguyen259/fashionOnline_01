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
}
