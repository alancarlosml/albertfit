<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $degree = ['Graduado', 'Especialista', 'Mestre', 'Doutor'];

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf' => $this->faker->unique()->numerify('###########'),
            'phone' => $this->faker->phoneNumber,
            'profile_picture' => null, // Pode adicionar um link para uma imagem aleatória, se desejar
            'academic_degree' => $this->faker->randomElement($degree),
            'professional_experience' => $this->faker->paragraph,
        ];
    }
}
