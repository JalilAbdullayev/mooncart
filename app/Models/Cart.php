<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'cart_products', 'cart_id', 'product_id')->withTimestamps();
    }

    public function cart_products() {
        return $this->hasMany(CartProduct::class, 'cart_id', 'id');
    }
}
