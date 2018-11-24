<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function index()
    {
        return About::all();
    }

    public function store()
    {
        $about = About::first();
        if ($about) {
            return true;
        } else {
            return false;
        }
    }
}
