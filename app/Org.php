<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
    public $timestamps = false;

    public $incrementing = false;

    protected $hidden = [
        'password', 'role', 'userid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function hasPassword()
    {
        return ! is_null($this->password);
    }
}
