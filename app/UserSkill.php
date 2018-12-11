<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

use App\Skill;

class UserSkill extends Model
{
    protected $hidden = [
        'id',
        'skill_id',
        'user_id'
    ];

    protected $appends = [
        'user_uuid',
        'skill_uuid'
    ];

    public function skill()
    {
        return $this->hasOne('App\Skill', 'id', 'skill_id');
    }

    public function getUserSkillWithUUID($uuid)
    {
        return UserSkill::where('uuid', $uuid)->first();
    }

    public function getUserUuidAttribute()
    {
        return User::find($this->user_id)->uuid;
    }

    public function getSkillUuidAttribute()
    {
        return Skill::find($this->skill_id)->uuid;
    }

}
