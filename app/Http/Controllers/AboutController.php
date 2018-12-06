<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;

class AboutController extends Controller
{
    public function index()
    {
        return About::first();
    }

    public function store(Request $request)
    {
        $count = About::count();
        if ($count > 0) {
            $about = About::first();
            $about->fill($request->all());
            $about->save();
        } else {
            $about = About::create($request->all());
        }

        return $about;
    }
}
