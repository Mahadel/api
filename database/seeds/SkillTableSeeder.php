<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        DB::table('skills')->insert([
            'category_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'توسعه اندروید',
            'en_name' => 'Android developer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'لاراول',
            'en_name' => 'Laravel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'پایتون',
            'en_name' => 'Python',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'نود جی‌اس',
            'en_name' => 'NodeJS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'توسعه آی‌اواس',
            'en_name' => 'iOS developer',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'دیتابیس',
            'en_name' => 'Database',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 1,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'رتروفیت',
            'en_name' => 'Retrofit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 2,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'متریال دیزاین',
            'en_name' => 'Material design',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('skills')->insert([
            'category_id' => 2,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'ادوبی ایلوستریتور',
            'en_name' => 'Adobe Illustrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('skills')->insert([
            'category_id' => 3,
            'uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'fa_name' => 'شطرنج',
            'en_name' => 'Chess',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
