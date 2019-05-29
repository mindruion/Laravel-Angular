<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [

        'title', 'url', 'requirements', 'coverImage', 'customer_id', 'domain', 'feedbacks', 'technologies', 'services_id'

    ];

    public function customer(){

        return $this->belongsTo('App\Customer');

    }

    public function services(){

        return $this->belongsTo('App\Service');

    }

    public function technologies(){

        return $this->belongsTo('App\Technology');

    }
}
