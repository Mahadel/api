<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skill = Skill::with('category')->get();
        return $skill;
    }

    public function update($uuid)
    {
        $skill = new Skill();
        $skill = $skill->getSkillWithUUID($uuid);
        if ($skill) {
            $skill->fa_name = $request->fa_name;
            $skill->en_name = $request->en_name;
            $skill->save();
            return Utils::responseMessage('success', 'update skill', 200);
        } else {
            return Utils::responseMessage('skill not found', 'update skill', 404);
        }
    }
    public function delete($uuid)
    {
        $skill = new Skill();
        $skill = $skill->getSkillWithUUID($uuid);
        if ($skill) {
            $skill->delete();
            return Utils::responseMessage('success', 'delete skill', 200);
        } else {
            return Utils::responseMessage('skill not found', 'delete skill', 404);
        }
    }
}
