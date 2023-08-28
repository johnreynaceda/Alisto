<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'admin'
        ]);

        User::create([
            'name' => 'Client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Service Provider',
            'email' => 'service-provider@gmail.com',
            'password' => bcrypt('password'),
            'user_type' => 'service provider'
        ]);
    }
}