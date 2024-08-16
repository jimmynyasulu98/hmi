<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cover;
use Illuminate\Database\Seeder;
use Database\Seeders\MemberSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       // User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
        $this->call(CoverSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(ServiceProviderSeeder::class);
        $this->call(MemberSeeder::class); //Member references cover
        $this->call(StaffSeeder::class);
   
        
    }
}
