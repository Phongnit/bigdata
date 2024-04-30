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
            [
                'id' => 16,
                'route_name' => 'emails.index',
                'title' => 'Danh sách Email',
                'created_at' => now(),
            ],
            [
                'id' => 17,
                'route_name' => 'emails.create',
                'title' => 'Tạo mới email',
                'created_at' => now(),
            ],
            [
                'id' => 18,
                'route_name' => 'emails.show',
                'title' => 'Xem chi tiết email',
                'created_at' => now(),
            ],
            [
                'id' => 19,
                'route_name' => 'emails.edit',
                'title' => 'Chỉnh sửa email',
                'created_at' => now(),
            ],
            [
                'id' => 20,
                'route_name' => 'emails.delete',
                'title' => 'Xóa email',
                'created_at' => now(),
            ],
            [
                'id' => 21,
                'route_name' => 'emails.send',
                'title' => 'Gửi email',
                'created_at' => now(),
            ],
            [
                'id' => 22,
                'route_name' => 'emails.sendmore',
                'title' => 'Gửi email theo bộ lọc',
                'created_at' => now(),
            ],
            [
                'id' => 23,
                'route_name' => 'emails.sendall',
                'title' => 'Gửi email cho tất cả',
                'created_at' => now(),
            ],
            [
                'id' => 24,
                'route_name' => 'emails.trashed',
                'title' => 'Xem thùng rác Email',
                'created_at' => now(),
            ],
            [
                'id' => 25,
                'route_name' => 'emails.return',
                'title' => 'Hoàn lại Email',
                'created_at' => now(),
            ],
            [
                'id' => 26,
                'route_name' => 'emails.draft',
                'title' => 'Xem bản nháp Email',
                'created_at' => now(),
            ],
 [
                'id' => 27,
                'route_name' => 'sms.index',
                'title' => 'Danh sách SMS',
                'created_at' => now(),
            ],
            [
                'id' => 28,
                'route_name' => 'sms.create',
                'title' => 'Tạo mới SMS',
                'created_at' => now(),
            ],
            [
                'id' => 29,
                'route_name' => 'sms.show',
                'title' => 'Xem chi tiết SMS',
                'created_at' => now(),
            ],
            [
                'id' => 30,
                'route_name' => 'sms.edit',
                'title' => 'Chỉnh sửa SMS',
                'created_at' => now(),
            ],
            [
                'id' => 31,
                'route_name' => 'sms.delete',
                'title' => 'Xóa SMS',
                'created_at' => now(),
            ],
            [
                'id' => 32,
                'route_name' => 'sms.send',
                'title' => 'Gửi SMS',
                'created_at' => now(),
            ],
            [
                'id' => 33,
                'route_name' => 'sms.sendmore',
                'title' => 'Gửi SMS theo bộ lọc',
                'created_at' => now(),
            ],
            [
                'id' => 34,
                'route_name' => 'sms.sendall',
                'title' => 'Gửi SMS cho tất cả',
                'created_at' => now(),
            ],
            [
                'id' => 35,
                'route_name' => 'sms.trashed',
                'title' => 'Xem thùng rác SMS',
                'created_at' => now(),
            ],
            [
                'id' => 36,
                'route_name' => 'sms.return',
                'title' => 'Hoàn lại SMS',
                'created_at' => now(),
            ],
            [
                'id' => 37,
                'route_name' => 'sms.draft',
                'title' => 'Xem bản nháp SMS',
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

        DB::table('table_submit')->insert([
            [
                'phone' => '098 431 7333',
                'name' => 'Lò Lâm Sung',
                'email' => 'lolamsungdb@gmail.com',
                'description' => '"Tôi sinh 12/1974, có bằng TN ĐH Luật, hiện đang là CC HC NN, muốn tìm cơ hội đi lao động FAM bên Úc, cần tư vấn: (1) với độ tuội như vậy có đi đc không, hai là tôi CHỉ đặt ra là đi lao động chân tay thôi có đc không, mong TV giúp. Xin cam ơn CT"',
                'fld_id' => '2',
                'cty_id' => '3',
                'created_at' => now(),
            ],
            [
                'phone' => '012 353 4543',
                'name' => 'Nguyễn thị ngọc bích',
                'email' => 'Ngocbichnguyen2412@gmail.com',
                'description' => 'Xkld ang Đức',
                'fld_id' => '1',
                'cty_id' => '6',
                'created_at' => now(),
            ],
            [
                'phone' => '174 789 4663',
                'name' => 'nguyễn đình đoàn',
                'email' => 'dinhdoancute.91@yahoo.com',
                'description' => 'Tôi đang muốn tìm hiểu kỹ hơn về việc đi lao động New Zealand, mong các bạn liên hệ tư vấn kỹ hơn giúp tôi về thủ tục và chi phí lao động ở nước này với ạ. Xin cảm ơn',
                'fld_id' => '1',
                'cty_id' => '6',
                'created_at' => now(),
            ],
            [
                'phone' => '+17046083757',
                'name' => 'Vũ thị thảo thuý',
                'email' => 'eglover@hotmail.com',
                'description' => '"Xklđ mỹ khó không ạ  Cần điều kiện ntn và  chi phí nhiều không ạ  Và công việc nó là những công việc gì v ạ "',
                'fld_id' => '1',
                'cty_id' => '5',
                'created_at' => now(),
            ],
            [
                'phone' => '435-567-7467',
                'name' => 'Le quang trí',
                'email' => 'Lequangtri93@gmail.Com',
                'description' => 'Xuất khẩu lao động nước ngoài',
                'fld_id' => '3',
                'cty_id' => '3',
                'created_at' => now(),
            ],
            [
                'phone' => '364.398.9204',
                'name' => 'Tham Tran',
                'email' => 'dedrick.walsh@yahoo.com',
                'description' => 'tv du hoc uc , lao đông',
                'fld_id' => '2',
                'cty_id' => '3',
                'created_at' => now(),
            ],
            [
                'phone' => '+1-820-264-1576',
                'name' => 'Nguyen Phuong',
                'email' => 'serena.gottlieb@yahoo.com',
                'description' => 'Tư vấn mua nhà đất ở Canada cho người chưa định cư',
                'fld_id' => '1',
                'cty_id' => '7',
                'created_at' => now(),
            ],
            [
                'phone' => '+1 (720) 630-7620',
                'name' => 'Tran quoc thinh',
                'email' => 'Tranquangthuong1968@gamil.com',
                'description' => 'Qua duc di lam an',
                'fld_id' => '2',
                'cty_id' => '1',
                'created_at' => now(),
            ],
            [
                'phone' => '601-421-7930',
                'name' => 'Trần Thị ánh Tuyết',
                'email' => 'aniyah.lebsack@yahoo.com',
                'description' => 'Nhân viên buồn phòng',
                'fld_id' => '1',
                'cty_id' => '6',
                'created_at' => now(),
            ],
        ]);

        $faker = Faker::create();

        // Số lượng bản ghi cần tạo
        $recordCount = 491;

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
