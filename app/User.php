<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'course', 'season', 'grade', 'gender', 'dateOfBirth', 'photoUrl', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'user_project', 'project_id', 'user_id');
    }
    public $visible = ['id', 'name', 'email', 'course', 'season', 'grade', 'gender', 'dateOfBirth', 'photoUrl', 'projects'];
}
