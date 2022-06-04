<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email'     => 'admin@gmail.com',
                'username'  => 'admin',
                'password'  => bcrypt('123456'),
                'role'      => 'Admin',
                'is_approve'=> '1'
            ],
            [
                'email'     => 'user@gmail.com',
                'username'  => 'user',
                'password'  => bcrypt('123456'),
                'role'      =>  null,
                'is_approve'=> '1'
            ],
            [
                'email'     => 'guest@gmail.com',
                'username'  => 'guest',
                'password'  => bcrypt('123456'),
                'role'      => 'Guest',
                'is_approve'=> '1'
            ],

        ];

        foreach ($data as $item) {
            User::create($item);
        }
    }
}
