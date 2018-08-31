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
            'user_email' => 'bkhezry@gmail.com',
            'skill_uuid' => '9f80fb9a-96f5-47ed-88aa-7b2d7aa9910f',
            'description' => 'description',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
