<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($uuid)
    {
        $user = User::with('userSkills')->where(['uuid' => $uuid])->first()->userSkills;
    }
}
