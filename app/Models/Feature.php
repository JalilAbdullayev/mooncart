<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model {
    protected $table = 'features';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'text',
        'image'
    ];
}
