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
        $teach_ids = $user_skill_teach->pluck('skill_id');
        $teach_ids->all();
        $learn_ids = $user_skill_learn->pluck('skill_id');
        $learn_ids->all();

        $want_learn_result = UserSkill::whereIn('skill_id', $learn_ids)->where(['skill_type' => 1])->get();
        $want_teach_result = UserSkill::whereIn('skill_id', $teach_ids)->where(['skill_type' => 2])->get();
        $data = array();
        foreach ($want_learn_result as $learn_item) {
            foreach ($want_teach_result as $teach_item) {
                if ($learn_item->user_uuid == $teach_item->user_uuid) {
                    $user = User::where('uuid', $teach_item->user_uuid)->first()->setVisible(['uuid', 'first_name', 'last_name', 'gender']);;
                    $result = [
                        'user' => $user,
                        'learn_skill_uuid' => $teach_item->skill_uuid,
                        'teach_skill_uuid' => $learn_item->skill_uuid,
                        'learn_description' => $teach_item->description,
                        'teach_description' => $learn_item->description
                    ];
                    array_push($data, $result);
                }
            }
        }
        return $data;
    }
}
