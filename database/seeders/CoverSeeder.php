<?php

namespace Database\Seeders;


use App\Models\Cover;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;



class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cover::create([
            'name' => 'STUDENT', 
        ]);
        Cover::create([
            'name' => 'COMPREHENSIVE',
              
        ]);
        Cover::create([
            'name' =>   'STANDARD',
            
        ]);
        Cover::create([
            'name' => 'ZIKOMO',
         
        ]);
        Cover::create([
            'name' => 'ABALE',
       
        ]);
        Cover::create([
            'name' =>   'COMPREHENSIVE-EX',
        ]);
        Cover::create([
            'name' =>  'STANDARD-EX'
        ]);

    }
}
