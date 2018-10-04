<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Utils;
use App\UserSkill;
use App\Skill;

class UserController extends Controller
{
    public function index()
    {
        return User::with('userSkills')->get();
    }
    public function getUserSkill($uuid)
    {
        if (User::isUserExistWithUUID($uuid)) {
            return User::with('userSkills')->where(['uuid' => $uuid])->first()->userSkills;
        } else {
            return Utils::responseMessage('user not found.', 'get user skills', 404);
        }
    }
    public function getUser($uuid)
    {
        if (User::isUserExistWithUUID($uuid)) {
            return User::with('userSkills')->where(['uuid' => $uuid])->first();
        } else {
            return Utils::responseMessage('user not found.', 'get user', 404);
        }
    }

    public function update(Request $request, $uuid)
    {
        $user = new User();
        $user = $user->getUserWithUUID($uuid);
        if ($user->uuid) {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->gender = $request->gender;
            $user->update();
            return Utils::responseMessage(
                'success',
                'update',
                200
            );
        } else {
            return Utils::responseMessage('user not found.', 'update user', 404);
        }
    }
    public function addUserSkill(Request $request, $uuid)
    {
        $user = new User();
        $user = $user->getUserWithUUID($uuid);
        if ($user) {
            $skill = new Skill();
            $skill = $skill->getSkillWithUUID($request->skill_uuid);
            if ($skill) {
                $user_skill = new UserSkill();
                $user_skill->uuid = Utils::generateUUID();
                $user_skill->user_uuid = $uuid;
                $user_skill->skill_uuid = $request->skill_uuid;
                $user_skill->description = $request->description;
                $user_skill->skill_type = $request->skill_type;
                $user_skill->save();
                return $user_skill;
            } else {
                return Utils::responseMessage('skill not found.', 'add skill of user', 404);
            }
        } else {
            return Utils::responseMessage('user not found.', 'add skill of user', 404);
        }
    }
    public function editUserSkill(Request $request, $uuid)
    {
        $user = new User();
        $user = $user->getUserWithUUID($uuid);
        if ($user) {
            $user_skill = new UserSkill();
            $user_skill = $user_skill->getUserSkillWithUUID($request->uuid);
            if ($user_skill) {
                $user_skill->description = $request->description;
                $user_skill->save();
                return $user_skill;
            } else {
                return Utils::responseMessage('user skill not found.', 'edit skill of user', 404);
            }
        } else {
            return Utils::responseMessage('user not found.', 'edit skill of user', 404);
        }
    }

    public function deleteUserSkill($uuid,$user_skill_uuid)
    {
        $user = new User();
        $user = $user->getUserWithUUID($uuid);
        if ($user) {
            $user_skill = new UserSkill();
            $user_skill = $user_skill->getUserSkillWithUUID($user_skill_uuid);
            if ($user_skill) {
                $user_skill->delete();                
                return Utils::responseMessage('success', 'delete skill of user', 200);
            } else {
                return Utils::responseMessage('user skill not found.', 'edit skill of user', 404);
            }
        } else {
            return Utils::responseMessage('user not found.', 'edit skill of user', 404);
        }
    }
}
