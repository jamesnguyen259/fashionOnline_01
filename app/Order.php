<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'address',
        'payment',
        'user_id',
        'total',
        'order_status',
    ];

    protected $table = 'orders';
    public $timestamp = true;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongstoMany('App\Product', 'product_id', 'order_id');
    }
}
