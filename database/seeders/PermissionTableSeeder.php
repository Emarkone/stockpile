<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'client',
            'supplier',
            'admin'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $permission = [];
    }
}
