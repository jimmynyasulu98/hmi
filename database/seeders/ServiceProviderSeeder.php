<?php

namespace Database\Seeders;

use App\Models\ServiceProvider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class ServiceProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* $member = new Member;
        $member->first_name = "member1";
        $member->last_name = "member1";
        $member->email = "member1@gmail.com";
        $member->password = Hash::make('1234');
        $member->remember_token = "";
        $member->save(); */

        ServiceProvider::factory(20)->create();

    }
}