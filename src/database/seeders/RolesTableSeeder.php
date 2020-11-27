<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name' => 'admin']);

        $crudUsers = Permission::create([
            'name' => 'CRUD users',
        ]);

        $crudPosts = Permission::create([
            'name' => 'CRUD posts',
        ]);

        $crudBooks = Permission::create([
            'name' => 'CRUD books',
        ]);

        $role->givePermissionTo([
            $crudUsers,
            $crudPosts,
            $crudBooks,
        ]);
    }
}
