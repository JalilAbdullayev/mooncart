<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $table = 'cart_products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
    ];
}
