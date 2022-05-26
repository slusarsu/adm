<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($user = User::where('email', 'admin@admin.com')->first()) {
            $role = Role::create([
                'name' => 'super-admin',
                'label' => 'Super Admin',
                'editable' => false,
            ]);

            $user->roles()->sync($role);
        }
    }
}
