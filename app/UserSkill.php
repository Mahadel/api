<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{

    public function skills()
    {
        return $this->hasMany('App\Skill', 'uuid', 'skill_uuid');
    }
}
