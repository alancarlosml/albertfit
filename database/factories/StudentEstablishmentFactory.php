<?php

namespace Database\Factories;

use App\Models\StudentContract;
use App\Models\Student;
use App\Models\Establishment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentEstablishmentFactory extends Factory
{
    protected $model = \App\Models\StudentEstablishment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::all()->random()->id,
            'establishment_id' => Establishment::all()->random()->id,
            'active' => $this->faker->boolean(),
        ];
        
    }
}

