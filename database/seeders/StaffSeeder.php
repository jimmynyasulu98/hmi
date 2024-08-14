<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = new Staff;
        $staff->first_name = "staff1";
        $staff->last_name = "staff1";
        $staff->email = "staff1@gmail.com";
        $staff->password = Hash::make('1234');
        $staff->remember_token = "";
        $staff->save();
    }
}
