<?php

use App\Models\Instructor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    protected $model = Instructor::class;

    public function definition(): array
    {
        $degree = ['Graduado', 'Especialista', 'Mestre', 'Doutor'];

        // Filtrando usuários com a função de instrutor
        $instructorIds = User::whereHas('establishments', function ($query) {
            $query->where('role', 'instrutor');
        })->pluck('id')->toArray();

        $instructorAttributes = [
            'user_id' => $this->faker->randomElement($instructorIds),
            'phone' => $this->faker->phoneNumber,
            'profile_picture' => null, // Pode adicionar um link para uma imagem aleatória, se desejar
            'academic_degree' => $this->faker->randomElement($degree),
            'professional_experience' => $this->faker->paragraph,
        ];

        return $instructorAttributes;
    }
}