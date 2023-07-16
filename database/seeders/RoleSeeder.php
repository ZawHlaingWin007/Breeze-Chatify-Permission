<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'superadmin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'admin',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'developer',
                'guard_name' => 'admin',
            ],
            [
                'name' => 'user',
                'guard_name' => 'web'
            ],
        ];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
                'guard_name' => $role['guard_name']
            ]);
        }
    }
}
