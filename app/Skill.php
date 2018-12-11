<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Category;

class Skill extends Model
{
    protected $fillable = [
        'category_id',
        'fa_name',
        'en_name',
        'uuid',
        'created_at',
        'updated_at'
    ];
    protected $hidden = [
        'id',
        'category_id'
    ];

    protected $appends = ['category_uuid'];

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

    public function getCategoryUuidAttribute()
    {
        return Category::find($this->category_id)->uuid;
    }
}
