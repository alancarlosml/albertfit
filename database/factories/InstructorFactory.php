<?php

namespace Database\Factories;

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $degree = ['Graduado', 'Especialista', 'Mestre', 'Doutor'];

        $instructorAttributes = [
            'user_id' => User::all()->random()->id,
            'phone' => $this->faker->phoneNumber,
            'profile_picture' => null, // Pode adicionar um link para uma imagem aleatória, se desejar
            'academic_degree' => $this->faker->randomElement($degree),
            'professional_experience' => $this->faker->paragraph,
        ];


        return $instructorAttributes;
    }
}
