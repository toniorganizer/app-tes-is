<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
                'name' => 'Pemerintah',
                'username' => 'pemangku_kebijakan',
                'email' => 'pemangku@gmail.com',
                'password' => bcrypt('12345'),
                'level' => 3,
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
