<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = ['David', 'Clair', 'John Doe', 'Kylo', 'Demo', 'Rose'];
        
        foreach ($users as $user) {
            $formatName = str_replace(' ', '', strtolower($user));
            $user = User::factory()->create([
                'name' => $user,
                'email' => "$formatName@gmail.com",
            ]);

            $user->assignRole('user');
        }
    }
}
