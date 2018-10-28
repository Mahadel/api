<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function search($uuid)
    {
        $user = User::with('userSkills')->where(['uuid' => $uuid])->first();
        return $user;
    }
}
