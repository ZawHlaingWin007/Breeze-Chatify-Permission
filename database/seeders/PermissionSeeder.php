<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $groupPermissions = [
            [
                'group_name' => 'Dashboard',
                'permissions' => [
                    'dashboard.index',
                ]
            ],
            [
                'group_name' => 'Role',
                'permissions' => [
                    'role.index',
                    'role.create',
                    'role.edit',
                    'role.delete',
                ]
            ],
            [
                'group_name' => 'Permission',
                'permissions' => [
                    'permission.index',
                    'permission.create',
                    'permission.edit',
                    'permission.delete'
                ]
            ],
            [
                'group_name' => 'Admin',
                'permissions' => [
                    'admin.index',
                    'admin.create',
                    'admin.show',
                    'admin.edit',
                    'admin.delete',
                ]
            ],
            [
                'group_name' => 'City',
                'permissions' => [
                    'city.index',
                    'city.create',
                    'city.edit',
                    'city.delete',
                    'city.mass_destroy'
                ]
            ],
            [
                'group_name' => 'Township',
                'permissions' => [
                    'township.index',
                    'township.create',
                    'township.edit',
                    'township.delete',
                    'township.mass_destroy'
                ]
            ],
        ];

        foreach ($groupPermissions as $groupPermission) {
            $groupName = $groupPermission['group_name'];
            $group = PermissionGroup::create([
                'name' => $groupName
            ]);

            foreach ($groupPermission['permissions'] as $permission) {
                Permission::create([
                    'name' => $permission,
                    'group_id' => $group->id,
                    'guard_name' => 'admin',
                ]);
            }
        }

        $permissions = Permission::all();
        $superAdminRole = Role::findByName('superadmin', 'admin');
        $superAdminRole->syncPermissions($permissions);

        $adminPermissions = [
            'dashboard.index',
            'admin.index',
            'admin.show',
            'city.index',
            'city.create',
            'city.edit',
            'city.delete',
            'city.mass_destroy',
            'township.index',
            'township.create',
            'township.edit',
            'township.delete',
            'township.mass_destroy'
        ];
        $adminRole = Role::findByName('admin', 'admin');
        $adminRole->syncPermissions($adminPermissions);

        $developerPermissions = PermissionGroup::where('name', 'Permission')->first()->permissions;
        $developerRole = Role::findByName('developer', 'admin');
        $developerRole->syncPermissions($developerPermissions);
    }
}
