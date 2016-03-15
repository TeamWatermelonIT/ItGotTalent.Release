<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_project', 'user_id', 'project_id');
    }
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
    public $visible = ['id', 'name', 'githubUrl', 'description', 'photos', 'users'];
}
