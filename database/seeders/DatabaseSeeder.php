<?php

namespace Database\Seeders;

use App\Models\ClassBooking;
use App\Models\ClassSchedule;
use App\Models\Establishment;
use App\Models\Instructor;
use App\Models\Modality;
use App\Models\Student;
use App\Models\StudentEstablishment;
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
        Student::factory(50)->create();
        Modality::factory(5)->create();
        ClassSchedule::factory(10)->create();
        ClassBooking::factory(10)->create();
        StudentEstablishment::factory(50)->create();

    }
}
