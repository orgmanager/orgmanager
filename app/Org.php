<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    public $timestamps = false;

    protected $hidden = [
        'password', 'role', 'userid',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'userid', 'id');
    }

    public function teams()
    {
      return $this->hasMany('App\Team');
    }

    public function team()
    {
      return $this->belongsTo('App\Team');
    }
}
