<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model {
    protected $table = 'product_images';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'image',
        'featured'
    ];
}
