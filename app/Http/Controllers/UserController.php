<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Utils;

class UserController extends Controller
{
    public function index()
    {
        return User::with('userSkills')->get();
    }
    public function getUserSkills($uuid)
    {
        return User::with('userSkills')->where(['uuid' => $uuid])->first()->userSkills;
    }
    public function getUser($uuid)
    {
        return User::with('userSkills')->where(['uuid' => $uuid])->first();
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

        }
    }
}
