<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'class'
    ];
}
