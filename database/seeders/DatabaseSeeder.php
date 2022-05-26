<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdmUserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdmLanguageSeeder::class);
        User::factory(100)->create();
    }
}
