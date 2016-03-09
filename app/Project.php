<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
