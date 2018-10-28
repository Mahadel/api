<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserSkill;

class SearchController extends Controller
{
    public function search($uuid)
    {
        $user = User::with('userSkills')->where(['uuid' => $uuid])->first();
        $userSkills = $user->userSkills;
        $user_skill_teach = $userSkills->filter(function ($value, $key) {
            if ($value['skill_type'] == 1) {
                return true;
            }
        })->values();
        $user_skill_teach->all();
        $user_skill_learn = $userSkills->filter(function ($value, $key) {
            if ($value['skill_type'] == 2) {
                return true;
            }
        })->values();
        $user_skill_learn->all();
        $teach_ids = $user_skill_teach->pluck('skill_uuid');
        $teach_ids->all();
        $learn_ids = $user_skill_learn->pluck('skill_uuid');
        $learn_ids->all();

        $want_learn_result = UserSkill::whereIn('skill_uuid', $learn_ids)->where(['skill_type' => 1])->get();
        $want_teach_result = UserSkill::whereIn('skill_uuid', $teach_ids)->where(['skill_type' => 2])->get();
        $merged = $want_learn_result->merge($want_teach_result);
        return $merged;
        foreach ($want_learn_result as $learn_item) {
            foreach ($want_teach_result as $teach_item) {
                if ($learn_item->user_uuid == $teach_item->user_uuid) {
                    return 'true';
                } else {
                    return 'false';
                }
            }
        }
        return $false;
    }
}
