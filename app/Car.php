<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
