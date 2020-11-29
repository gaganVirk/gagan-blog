<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Gagan',
            'email' => 'gagan@ocular.nz',
            'password' => Hash::make('secretpassword'),
        ]);


        // Create a role (admin)
         $user->assignRole('admin');
         $user->hasPermissionTo('CRUD posts');

        // Create a permission (create posts)

        // Assign that permission to the role

        // Attach to the user you just created
        // $user->assignRole($adminRole);
    }
}
