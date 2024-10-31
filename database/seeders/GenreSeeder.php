<?php

namespace Database\Seeders;

use App\Models\genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        genre::insert([
            ['title' => 'Adventure'],
            ['title' => 'Action'],
            ['title' => 'Comedy'],
            ['title' => 'Drama'],
            ['title' => 'Isekai'],
            ['title' => 'Parody'],
        ]);
    }
}
