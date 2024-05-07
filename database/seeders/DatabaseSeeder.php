<?php

namespace Database\Seeders;

use App\Models\Establishment;
use App\Models\Instructor;
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
        Establishment::factory(5)->create();
        User::factory(10)->create();
        Instructor::factory(3)->create();

    }
}
