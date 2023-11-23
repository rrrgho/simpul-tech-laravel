<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Rian Gho',
                'phone' => '081311111111',
                'email' => 'riangho@gmail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Bill Gates',
                'phone' => '08131117912',
                'email' => 'billgates@gmail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Jack Ma',
                'phone' => '081311111111',
                'email' => 'jackma@gmail.com',
                'password' => bcrypt('admin'),
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
