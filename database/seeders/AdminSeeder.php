<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = Admin::factory()->create([
            'name' => 'Superadmin',
            'email' => "superadmin@gmail.com",
        ]);
        $superAdmin->assignRole('superadmin');

        $admins = ['Admin', 'Admin One'];
        foreach ($admins as $admin) {
            $formatName = str_replace(' ', '', strtolower($admin));
            $admin = Admin::factory()->create([
                'name' => $admin,
                'email' => "$formatName@gmail.com",
            ]);
            $admin->assignRole('admin');
        }

        $developer = Admin::factory()->create([
            'name' => 'Developer',
            'email' => "developer@gmail.com",
        ]);
        $developer->assignRole('developer');
    }
}
