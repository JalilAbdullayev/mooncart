<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'color',
        'size',
        'quantity',
        'price',
        'discount',
        'description',
        'about',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id')->withTimestamps();
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    public function featuredImage() {
        return $this->hasOne(ProductImages::class, 'product_id', 'id')->whereFeatured(1);
    }

    public function images() {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function carts() {
        return $this->belongsToMany(Cart::class, 'cart_products', 'product_id', 'cart_id')->withTimestamps();
    }
}
