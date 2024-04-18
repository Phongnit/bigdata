<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // data lĩnh vực 
        DB::table('table_field')->insert([
            [
                'id' => 1,
                'name' => 'XKLĐ',
            ], [
                'id' => 2,
                'name' => 'Du học',
            ], [
                'id' => 3,
                'name' => 'Du lịch',
            ]
        ]);
        //data đất nước
        DB::table('table_country')->insert([
            [
                'id' => 1,
                'name' => 'Úc',
            ], [
                'id' => 2,
                'name' => 'Hàn Quốc',
            ], [
                'id' => 3,
                'name' => 'Nhật bản',
            ], [
                'id' => 4,
                'name' => 'Mỹ',
            ], [
                'id' => 5,
                'name' => 'Pháp',
            ], [
                'id' => 6,
                'name' => 'Đức',
            ], [
                'id' => 7,
                'name' => 'Trung Quốc',
            ]
        ]);


        $faker = Faker::create();

        // Số lượng bản ghi cần tạo
        $recordCount = 500;

        for ($i = 0; $i < $recordCount; $i++) {
            $phone = $faker->phoneNumber;
            $name = $faker->name;
            $email = $faker->email;
            $description = $faker->sentence;
            $fld_id = $faker->numberBetween(1, 3);
            $cty_id = $faker->numberBetween(1, 7);

            // Tạo bản ghi
            DB::table('table_submit')->insert([
                'phone' => $phone,
                'name' => $name,
                'email' => $email,
                'description' => $description,
                'fld_id' => $fld_id,
                'cty_id' => $cty_id,
            ]);
        }
    }
}
