<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("user_skills")->insert([
            'user_uuid' => 'fd309352-6c59-4fcb-816c-c1a702bf0796',
            'skill_uuid' => '7daa01fb-7d25-44c0-b502-3b144707c439',
            'skill_type' => 1,
            'description' => 'description',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table("user_skills")->insert([
            'user_uuid' => 'fd309352-6c59-4fcb-816c-c1a702bf0796',
            'skill_uuid' => '7daa01fb-7d25-44c0-b502-3b144707c439',
            'skill_type' => 2,
            'description' => 'description',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
