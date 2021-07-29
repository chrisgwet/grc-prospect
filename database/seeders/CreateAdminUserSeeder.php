<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */

    public function run()
    {
        $user = User::create([
            'name' => 'Dieudonne Gwet',
            'email' => 'dieudonnegwet86@gmail.com',
            'telephone' => '695570650',
            'password' => Hash::make('Capricorne11011986')
        ]);

        $role = Role::create(['name' => 'super-administrator']);
        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
