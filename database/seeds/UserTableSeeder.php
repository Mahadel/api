<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table("users")->insert([
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'email'=>'bkhezry@gmail.com',
            'first_name'=>'Behrouz',
            'last_name'=>'Khezry',
            'gender'=>1,
            'token'=>"token",
            'description'=>'Description',
            'user_type'=>10,
            'is_active'=>1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
