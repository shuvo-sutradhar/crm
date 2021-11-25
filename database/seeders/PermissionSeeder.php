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
                'name' => 'Orders View',
                'slug' => 'order-view',
                'guard_name' => 'orders',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Client View',
                'slug' => 'client-view',
                'guard_name' => 'client',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Ticket View',
                'slug' => 'ticket-view',
                'guard_name' => 'ticket',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Invoice View',
                'slug' => 'invoice-view',
                'guard_name' => 'invoice',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Service View',
                'slug' => 'service-view',
                'guard_name' => 'service',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Order From View',
                'slug' => 'order-form-view',
                'guard_name' => 'order-form',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Cupon View',
                'slug' => 'cupons-view',
                'guard_name' => 'cupon',
                'created_at' => \now(),
                'updated_at' => \now(),
            ],
            [
                'name' => 'Settings View',
                'slug' => 'settings-view',
                'guard_name' => 'settings',
                'created_at' => \now(),
                'updated_at' => \now(),
            ]
        ]);
    }
}
