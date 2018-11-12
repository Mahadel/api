<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = [
        'uuid',
        'user_uuid_from',
        'user_uuid_to',
        'learn_skill_uuid_from',
        'teach_skill_uuid_from',
        'email_from',
        'email_to',
        'description',
        'created_at',
        'updated_at'
    ];
    protected $hidden = ['id'];

    public function user()
    {
        return $this->hasOne('App\User', 'uuid', 'user_uuid_from')->setVisible(['id']);
    }
}
