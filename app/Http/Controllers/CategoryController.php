<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;
use App\Utils;
use App\Skill;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('skills')->get();
        return $categories;
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->fa_name = $request->fa_name;
        $category->en_name = $request->en_name;
        $category->uuid = Utils::generateUUID();
        $category->save();
        return $category;
    }

    public function storeSkill(Request $request, $uuid)
    {
        $skill = new Skill();
        $skill->category_uuid = $uuid;
        $skill->fa_name = $request->fa_name;
        $skill->en_name = $request->en_name;
        $skill->uuid = Utils::generateUUID();
        $skill->save();
        return $skill;
    }
}
