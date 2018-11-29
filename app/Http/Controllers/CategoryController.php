<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Http\Request;
use App\Utils;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('skills')->get();
        return $categories;
    }
    public function store(Request $request)
    {
        return $request;
        $category = new Category();
        $category->fa_name = $request->fa_name;
        $category->en_name = $request->en_name;
        $category->uuid = Utils::generateUUID();
        $category->save();
        return $category;
    }
}
