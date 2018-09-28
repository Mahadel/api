<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $hidden = [
        'id'
    ];
    public function skill()
    {
        return $this->hasOne('App\Skill', 'uuid', 'skill_uuid');
    }

    public function getUserSkillWithUUID($uuid)
    {
        return UserSkill::where('uuid', $uuid)->first();
    }
}
