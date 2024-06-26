<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model {
    protected $table = 'campaigns';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'subtitle',
        'text',
        'image'
    ];
}
