<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'category_id',
        'fa_name',
        'en_name',
        'created_at',
        'updated_at'
    ];
    protected $hidden=[
        'created_at',
        'updated_at',
        'id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
