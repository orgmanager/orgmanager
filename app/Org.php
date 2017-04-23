<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
      'id', 'name', 'url', 'description', 'avatar', 'custom_message',
    ];

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
