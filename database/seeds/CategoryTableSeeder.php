<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            'uuid'=>"1",
            'fa_name' => "برنامه‌نویسی",
            'en_name' => "Programming",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table("categories")->insert([
            'uuid'=>"2",
            'fa_name' => "طراحی",
            'en_name' => "Design",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table("categories")->insert([
            'uuid'=>"3",
            'fa_name' => "ورزش",
            'en_name' => "Sport",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
