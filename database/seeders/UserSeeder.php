<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username'=>'admin',
                'level'=>'admin',
                'password'=>Hash::make('admin')
            ],
            
            [
                'username'=>'u1',
                'level'=>'user',
                'password'=>Hash::make('a')
            ],
            [
                'username'=>'u2',
                'level'=>'user',
                'password'=>Hash::make('a')
            ],

        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
