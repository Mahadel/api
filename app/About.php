<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'app_version',
        'app_url',
        'changelog_url',
        'license_url',
        'sponsor_name',
        'sponsor_description',
        'sponsor_url'
    ];
}
