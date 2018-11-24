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

    public function store(Request $request)
    {
        $about = About::first();
        if ($about) {
            $about->app_version = $request->app_version;
            $about->app_url = $request->app_url;
            $about->changelog_url = $request->changelog_url;
            $about->license_url = $request->license_url;
            $about->sponsor_name = $request->sponsor_name;
            $about->sponsor_description = $request->sponsor_description;
            $about->sponsor_url = $request->sponsor_url;
            $about->save();
        } else {
            $about_new = new About();
            $about_new->app_version = $request->app_version;
            $about_new->app_url = $request->app_url;
            $about_new->changelog_url = $request->changelog_url;
            $about_new->license_url = $request->license_url;
            $about_new->sponsor_name = $request->sponsor_name;
            $about_new->sponsor_description = $request->sponsor_description;
            $about_new->sponsor_url = $request->sponsor_url;
            $about_new->save();
        }
    }
}
