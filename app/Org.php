<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    public $timestamps = false;

    public function user(){
      return $this->belongsTo('App\User', 'userid', 'id');
    }
}
