<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Establishment;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserEstablishmentFactory extends Factory
{
    protected $model = \App\Models\UserEstablishment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $roles = ['superuser', 'admin', 'instrutor', 'recepcionista', 'assistente', 'nutricionista'];
    
        return [
            'user_id' => User::factory()->create()->id,
            'establishment_id' => Establishment::factory()->create()->id,
            'role' => $this->faker->randomElement($roles),
            'active' => $this->faker->boolean(90),
        ];
    }
}
