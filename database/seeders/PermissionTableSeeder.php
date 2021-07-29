<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */

    public function run()
    {
        $permissions = [
            'domaine-list', 'domaine-create', 'domaine-edit', 'domaine-delete',
            'users-list', 'users-create', 'users-edit', 'users-delete',
            'prospect-list', 'prospect-create', 'prospect-edit', 'prospect-delete',
            'relance-list', 'relance-create', 'relance-edit', 'relance-delete',
            'dashboard'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
