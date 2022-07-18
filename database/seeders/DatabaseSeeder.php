<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\CategoryTableSeeder;
use Database\Seeders\PermissionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // $this->call('PermissionTableSeeder');
        // $this->call('UserTableSeeder');

        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        // $this->call(CategoryTableSeeder::class);
        // $this->call(PortfolioSeeder::class);

    }
}
