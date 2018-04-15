<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $permissions = Permission::pluck('id')->all();

        $role = Role::create(['name' => 'superadmin']);
        $role->syncPermissions($permissions);

        $user = User::create([
            'name' => 'Taufan Prasetyo',
            'email' => 'taufan@mail.com',
            'password' => bcrypt('123456'),
        ]);

        $user->assignRole($role->name);
    }
}
