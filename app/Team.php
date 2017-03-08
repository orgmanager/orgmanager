<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = false;

    public function org()
    {
        return $this->belongsTo('App\Org');
    }
}
