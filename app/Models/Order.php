<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id'];

    public function products() {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withTimestamps();
    }

    public function order_products() {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}
