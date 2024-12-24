<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Reader;
use Faker\Factory as Faker;

class ReadersTableSeeder extends Seeder
{
    public function run()
    {
        // Khởi tạo Faker
        $faker = Faker::create();

        // Tạo 10 độc giả giả
        for ($i = 0; $i < 10; $i++) {
            Reader::create([
                'name' => $faker->name,
                'birthday' => $faker->date(),
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}


