<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => "admin@test.com",
            'email_verified_at' => now(),
            'user_type' => "admin",
            'password' => Hash::make("test"),
            'phone_number' => "0606060606",
            'mailing_address' => "11 Etheria Road",
            'remember_token' => Str::random(10),
        ]);
    }
}
