<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') == 'local') {

            // User::truncate();

            $users = [
                [
                    'name'     => 'fahath',
                    'email'    => 'fahathammex90@gmail.com',
                    'is_admin'  => '0',
                    'avatar'  => 'avatar/fahath.jpg',
                    'password' => Hash::make('12345678'),
                ],
                [
                    'name'     => 'fahath1',
                    'email'    => 'fahathammex901@gmail.com',
                    'avatar'  => 'avatar/fahath.jpg',
                    'is_admin'  => '1',
                    'password' => Hash::make('12345678'),
                ],
            ];

            foreach ($users as $user) {
                User::create($user);
            }
        }
    }
}
