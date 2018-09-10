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
            'skill_uuid' => '8a30ebfe-5f45-49be-955d-33894f6cf1c4',
            'description' => 'description',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
