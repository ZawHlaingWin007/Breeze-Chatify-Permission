<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = ['users', 'roles', 'permissions', 'permission_groups'];

    public function run(): void
    {
        Model::unguard();

        Schema::disableForeignKeyConstraints();

        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }

        Schema::enableForeignKeyConstraints();

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
        ]);

        Model::reguard();

    }
}
