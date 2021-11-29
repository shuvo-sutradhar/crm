<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'name' => 'Dashboard View',
                'slug' => 'dashboard-view',
                'guard_name' => 'dashboard',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'My Desk',
                'slug' => 'my-desk',
                'guard_name' => 'mydesk',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Attandance history',
                'slug' => 'attandance',
                'guard_name' => 'attandancehistory',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Settings View',
                'slug' => 'settings',
                'guard_name' => 'settings',
                'created_at' => \now(),
                'updated_at' => \now(),
            ]
        ]);
    }
}
