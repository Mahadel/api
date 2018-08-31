<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function userSkills()
    {
        return $this->hasMany('App\UserSkill', 'user_email', 'email');
    }
}
