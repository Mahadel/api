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
    protected $hidden = [
        'id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getSkillWithUUID($uuid)
    {
        return Skill::where('uuid', $uuid)->first();
    }

    public static function isSkillExistWithUUID($uuid)
    {
        if (Skill::where('uuid', $uuid)->first()) {
            return true;
        } else {
            return false;
        }
    }
}
