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

        $faker = Faker::create();

        // Số lượng bản ghi cần tạo
        $recordCount = 100;

        for ($i = 0; $i < $recordCount; $i++) {
            $phone = $faker->phoneNumber;
            $name = $faker->name;
            $email = $faker->email;
            $description = $faker->sentence;
            $fld_id = $faker->numberBetween(1, 2);
            $cty_id = $faker->numberBetween(1, 2);

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
