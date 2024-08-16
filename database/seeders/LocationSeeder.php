<?php

namespace Database\Seeders;


use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'full_name' => 'UNIMA', 
        ]);
        Location::create([
            'full_name' => 'LUANAR BUNDA',
              
        ]);
        Location::create([
            'full_name' =>   'LUANAR NRC',
            
        ]);
        Location::create([
            'full_name' => 'MUBAS',
         
        ]);
        Location::create([
            'full_name' => 'KUHES',
       
        ]);

    }
}
