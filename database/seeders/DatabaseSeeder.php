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
                'role_id' => 'administrator',
                'created_at' => now(),
            ], [
                'id' => 2,
                'name' => 'Leader',
                'role_id' => 'leader',
                'created_at' => now(),
            ], [
                'id' => 3,
                'name' => 'Sales',
                'role_id' => 'sales',
                'created_at' => now(),
            ]
        ]);

        DB::table('table_permission')->insert([
            [
                'id' => 1,
                'route_name' => 'submit.list',
                'title' => 'Danh sách khách hàng',
                'created_at' => now(),
            ], [
                'id' => 2,
                'route_name' => 'submit.create',
                'title' => 'Tạo mới khách hàng',
                'created_at' => now(),
            ], [
                'id' => 3,
                'route_name' => 'submit.show',
                'title' => 'Chi tiết khách hàng',
                'created_at' => now(),
            ]
            , [
                'id' => 4,
                'route_name' => 'submit.edit',
                'title' => 'Chỉnh sửa khách hàng',
                'created_at' => now(),
            ], [
                'id' => 5,
                'route_name' => 'submit.delete',
                'title' => 'Xóa khách hàng',
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'route_name' => 'users.index',
                'title' => 'Danh sách người dùng',
                'created_at' => now(),
            ], [
                'id' => 7,
                'route_name' => 'users.create',
                'title' => 'Tạo mới người dùng',
                'created_at' => now(),
            ], [
                'id' => 8,
                'route_name' => 'users.show',
                'title' => 'Chi tiết người dùng',
                'created_at' => now(),
            ]
            , [
                'id' => 9,
                'route_name' => 'users.edit',
                'title' => 'Chỉnh sửa người dùng',
                'created_at' => now(),
            ], [
                'id' => 10,
                'route_name' => 'users.delete',
                'title' => 'Xóa người dùng',
                'created_at' => now(),
            ],
            [
                'id' => 11,
                'route_name' => 'roles.index',
                'title' => 'Danh sách roles',
                'created_at' => now(),
            ], [
                'id' => 12,
                'route_name' => 'roles.create',
                'title' => 'Tạo mới roles',
                'created_at' => now(),
            ], [
                'id' => 13,
                'route_name' => 'roles.user',
                'title' => 'Chi tiết roles',
                'created_at' => now(),
            ]
            , [
                'id' => 14,
                'route_name' => 'roles.edit',
                'title' => 'Chỉnh sửa roles',
                'created_at' => now(),
            ], [
                'id' => 15,
                'route_name' => 'roles.delete',
                'title' => 'Xóa roles',
                'created_at' => now(),
            ],
        ]);
        DB::table('table_role_per')->insert([
            ['role_id'=>1,'per_id'=>1],
            ['role_id'=>1,'per_id'=>2],
            ['role_id'=>1,'per_id'=>3],
            ['role_id'=>1,'per_id'=>4],
            ['role_id'=>1,'per_id'=>5],
            ['role_id'=>1,'per_id'=>6],
            ['role_id'=>1,'per_id'=>7],
            ['role_id'=>1,'per_id'=>8],
            ['role_id'=>1,'per_id'=>9],
            ['role_id'=>1,'per_id'=>10],
            ['role_id'=>1,'per_id'=>11],
            ['role_id'=>1,'per_id'=>12],
            ['role_id'=>1,'per_id'=>13],
            ['role_id'=>1,'per_id'=>14],
            ['role_id'=>1,'per_id'=>15],
            ['role_id'=>2,'per_id'=>1],
            ['role_id'=>2,'per_id'=>2],
            ['role_id'=>2,'per_id'=>3],
            ['role_id'=>2,'per_id'=>4],
            ['role_id'=>2,'per_id'=>5],
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
                'created_at' => now(),
            ], [
                'id' => 2,
                'name' => 'leader',
                'phone' => '0987654321',
                'email' => 'leader@gmail.com',
                'password' => Hash::make('leader@123'),
                'role_id' => 2,
                'created_at' => now(),
            ], [
                'id' => 3,
                'name' => 'Saler',
                'phone' => '1234567890',
                'email' => 'sale@gmail.com',
                'password' => Hash::make('sale@123'),
                'role_id' => 3,
                'created_at' => now(),
            ]
        ]);
        // data lĩnh vực 
        DB::table('table_field')->insert([
            [
                'id' => 1,
                'name' => 'XKLĐ',
                'created_at' => now(),
            ], [
                'id' => 2,
                'name' => 'Du học',
                'created_at' => now(),
            ], [
                'id' => 3,
                'name' => 'Du lịch',
                'created_at' => now(),
            ]
        ]);
        //data đất nước
        DB::table('table_country')->insert([
            [
                'id' => 1,
                'name' => 'Úc',
                'created_at' => now(),
            ], [
                'id' => 2,
                'name' => 'Hàn Quốc',
                'created_at' => now(),
            ], [
                'id' => 3,
                'name' => 'Nhật bản',
                'created_at' => now(),
            ], [
                'id' => 4,
                'name' => 'Mỹ',
                'created_at' => now(),
            ], [
                'id' => 5,
                'name' => 'Pháp',
                'created_at' => now(),
            ], [
                'id' => 6,
                'name' => 'Đức',
                'created_at' => now(),
            ], [
                'id' => 7,
                'name' => 'Trung Quốc',
                'created_at' => now(),
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

        $smscount = 50;
        for ($i = 0; $i < $smscount; $i++) {
            $subject = $faker->sentence;
            $content = $faker->paragraphs(5, true);
            $created_at = Carbon::now()->subDays($faker->numberBetween(1, 30));
            $status = $faker->numberBetween(0, 1);
            $user_id = $faker->numberBetween(1, 3);
            // $softdelete = $faker->numberBetween(0, 1);

            // Tạo bản ghi
            DB::table('table_sms')->insert([
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
