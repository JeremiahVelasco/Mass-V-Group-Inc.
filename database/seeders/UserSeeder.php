<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admins;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users=[
            [
                'user'=>'Kobe',
                'password'=>bcrypt('pepper22'),
                'role'=>1
            ],
            [
                'user'=>'Jeremiah',
                'password'=>bcrypt('pepper22'),
                'role'=>2
            ],
        ];
        foreach($users as $user){
            Admins::create($user);
        }
    }
}
