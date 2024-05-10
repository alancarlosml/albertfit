<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StudentContract;

class StudentContractFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StudentContract::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $serviceNames = ['semanal', 'mensal', 'trimestral', 'semestral', 'anual'];
        $paymentTypes = ['credito', 'debito', 'pix', 'boleto', 'dinheiro'];

        return [
            'student_id' => \App\Models\Student::all()->random()->id,
            'establishment_id' => \App\Models\Establishment::all()->random()->id,
            'service_name' => $this->faker->randomElement($serviceNames),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'payment_date' => $this->faker->date(),
            'payment_type' => $this->faker->randomElement($paymentTypes),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->dateTimeBetween('start_date', '+1 year')->format('Y-m-d'),
            'active' => $this->faker->boolean(90), // Ajuste aqui se desejar mudar a probabilidade de ativo/inativo
        ];
    }
}
