<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->first_name = "user1";
        $user->last_name = "user1";
        $user->email = "user1@gmail.com";
        $user->password = Hash::make('1234');
        $user->remember_token = "";
        $user->save();
    }
}
