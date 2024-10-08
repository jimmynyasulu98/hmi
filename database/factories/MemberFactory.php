<?php

namespace Database\Factories;

use App\Models\Cover;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected static ?string $password;
    public function definition(): array
    {   
        $university_id = rand(1,6);
        $serial_number = rand(10101,50120);
        $member_id = rand(1,6);
        return [
            'membership_number' => "{$university_id}-0118-{$serial_number}-{$member_id}",
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'is_principal' => $this->faker->boolean(),
            'location_id'=> rand(1,5),
            'cover_id'=> rand(1,6),
            'remember_token' => Str::random(10),
        ];
    }
}
