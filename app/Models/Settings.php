<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'email',
        'phone',
        'address',
        'author',
        'keywords',
        'favicon',
        'logo',
        'description',
    ];
}
