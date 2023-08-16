<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    public function run()
    {
        // Attach roles to specific users
        $userId = DB::table('users')->insertGetId([
            'name' => 'User',
            'username' => 'user123',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        $adminUserId = DB::table('users')->insertGetId([
            'name' => 'Admin User',
            'username' => 'admin123',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $superUserId = DB::table('users')->insertGetId([
            'name' => 'Super User',
            'username' => 'superuser123',
            'email' => 'superuser@example.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('user_roles')->insert([
            ['user_id' => $userId, 'role_id' => 1],
            ['user_id' => $adminUserId, 'role_id' => 2],
            ['user_id' => $superUserId, 'role_id' => 3],
        ]);
    }
}
