<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    // get all users with a given role
    public function users()
    {
        return $this->hasMany('users');
    }
}
