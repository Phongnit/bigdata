<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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

        // data roles
        DB::table('table_role')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
            ], [
                'id' => 2,
                'name' => 'Leader',
            ], [
                'id' => 3,
                'name' => 'Sales',
            ]
        ]);

        // data lĩnh vực 
        DB::table('table_users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'phone' => '0123456789',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin@123'),
                'role_id' => 1,
            ], [
                'id' => 2,
                'name' => 'leader',
                'phone' => '0987654321',
                'email' => 'leader@gmail.com',
                'password' => Hash::make('leader@123'),
                'role_id' => 2,
            ], [
                'id' => 3,
                'name' => 'Saler',
                'phone' => '1234567890',
                'email' => 'sale@gmail.com',
                'password' => Hash::make('sale@123'),
                'role_id' => 3,
            ]
        ]);
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
            $created_at = Carbon::now()->subDays($faker->numberBetween(1, 30));


            // Tạo bản ghi
            DB::table('table_submit')->insert([
                'phone' => $phone,
                'name' => $name,
                'email' => $email,
                'description' => $description,
                'fld_id' => $fld_id,
                'cty_id' => $cty_id,
                'created_at' => $created_at,

            ]);
        }

        $emailcount = 50;
        for ($i = 0; $i < $emailcount; $i++) {
            $subject = $faker->sentence;
            $content = $faker->paragraphs(5, true);
            $created_at = Carbon::now()->subDays($faker->numberBetween(1, 30));
            $status = $faker->numberBetween(0, 1);
            $user_id = $faker->numberBetween(1, 3);
            // $softdelete = $faker->numberBetween(0, 1);

            // Tạo bản ghi
            DB::table('table_emails')->insert([
                'subject' => $subject,
                'content' => $content,
                'created_at' => $created_at,
                'user_id' => $user_id,
                'status' => $status,
                // 'softdelete' => $softdelete,
            ]);
        }
    }
}
