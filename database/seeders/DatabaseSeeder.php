<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'opikopik073@gmail.com',
            'password' => 'admin#1234',
            'role' => 'admin',
        ]);

        $this->call([
            GenreSeeder::class,
        ]);
    }


}
