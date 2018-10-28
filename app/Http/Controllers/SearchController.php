<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search($uuid)
    {
        return $uuid;
    }
}
