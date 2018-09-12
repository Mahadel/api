<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $fillable = [
        'uuid'
    ];

    public function userSkills()
    {
        return $this->hasMany('App\UserSkill', 'user_email', 'email')->with('skill');
    }

    public function storeOrLogin(User $user)
    {
        $old_user = $this->getUserWithEmail($user->email);
        if ($old_user) {
            return Utils::returnToken($old_user->uuid, $old_user->token, "success", 'login', 200);
        } else {
            $user->save();
            return Utils::returnToken($user->uuid, $user->token, "success", 'store', 200);
        }

    }

    private function getUserWithEmail($email)
    {
        return User::where('email', $email)->first();
    }
    public function getUserWithUUID($uuid)
    {
        return User::where('uuid', $uuid)->first();
    }

    public function isExist($uuid, $token)
    {
        $user = $this->getUserWithUUID($uuid);
        if ($user->uuid) {
            if ($user->token == $token) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
