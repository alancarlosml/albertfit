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
