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
        $category = Category::create($request->all() + [
            'uuid' => Utils::generateUUID()
        ]);
        return $category;
    }

    public function storeSkill(Request $request, $uuid)
    {
        $skill = Skill::create($request->all() + [
            'category_id' => Category::where('uuid', $uuid)->first()->id,
            'uuid' => Utils::generateUUID()
        ]);
        return $skill;
    }

    public function update(Request $request, $uuid)
    {
        $category = new Category();
        $category = $category->getWithUUID($uuid);
        if ($category) {
            $category->fill($request->all());
            $category->save();
            return Utils::responseMessage('success', 'update category', 200);
        } else {
            return Utils::responseMessage('category not found', 'update category', 404);
        }

    }

    public function delete($uuid)
    {
        $category = new Category();
        $category = $category->getWithUUID($uuid);
        if ($category) {
            $category->delete();
            return Utils::responseMessage('success', 'delete category', 200);
        } else {
            return Utils::responseMessage('category not found', 'delete category', 404);
        }

    }
}
