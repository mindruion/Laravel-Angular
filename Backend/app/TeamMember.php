<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'full_name',
        'job',
        'email',
        'photo',
        'skills'
    ];
}
