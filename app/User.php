<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $fillable = [
        'uuid'
    ];
    protected $hidden = [
        'id',
        'uuid',
        'email',
        'token',
        'description',
        'user_type',
        'is_active',
        'created_at',
        'updated_at'
    ];

    public function userSkills()
    {
        return $this->hasMany('App\UserSkill', 'user_uuid', 'uuid');
    }

    public function storeOrLogin(User $user)
    {
        $old_user = $this->getUserWithEmail($user->email);
        if ($old_user) {
            if ($old_user->is_active == 1) {
                return Utils::returnToken($old_user->uuid, $old_user->token, "success", 'login', true, 200);
            } else {
                return Utils::responseMessage("Your account permanently deactivated.", 'login', 403);
            }
        } else {
            $user->save();
            return Utils::returnToken($user->uuid, $user->token, "success", 'store', false, 200);
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

    public static function isUserExistWithUUID($uuid)
    {
        if (User::where('uuid', $uuid)->first()) {
            return true;
        } else {
            return false;
        }
    }

    public function isExist($uuid, $token)
    {
        $user = $this->getUserWithUUID($uuid);
        if ($user) {
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
}
