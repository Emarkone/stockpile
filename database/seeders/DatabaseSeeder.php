<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(124)->create();
        \App\Models\Product::factory(212)->create();
        \App\Models\Inbound::factory(302)->create();
        \App\Models\Outbound::factory(450)->create();

        $this->call([
            PermissionTableSeeder::class,
            AdminUserSeeder::class
        ]);
        
    }
}
