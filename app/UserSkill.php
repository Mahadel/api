<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{

    public function skill()
    {
        return $this->hasOne('App\Skill', 'uuid', 'skill_uuid');
    }
}
