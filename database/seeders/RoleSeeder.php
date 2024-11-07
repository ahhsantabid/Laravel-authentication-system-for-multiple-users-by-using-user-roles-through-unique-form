<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $roles = ['admin', 'HQ_store', 'factory_store', 'trims', 'purchage', 'accounts'];
    foreach ($roles as $role) {
        Role::create(['name' => $role]);
    }
}
}
