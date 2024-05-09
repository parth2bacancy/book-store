<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'user',
                'display_name' => 'User',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'guest',
                'display_name' => 'Guest',
                'guard_name' => 'web',
                'created_at' => now(),
            ],
            [
                'name' => 'author',
                'display_name' => 'Author',
                'guard_name' => 'web',
                'created_at' => now(),
            ]
        ]);
    }
}
