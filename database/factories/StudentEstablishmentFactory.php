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
        // Busca um aluno aleatório
        $student = Student::inRandomOrder()->first();

        // Busca um estabelecimento aleatório
        $establishment = Establishment::inRandomOrder()->first();

        // Define um nome de serviço aleatório
        $serviceName = $this->faker->randomElement(['semanal', 'mensal', 'trimestral', 'semestral', 'anual']);

        // Define um valor aleatório para o contrato
        $amount = $this->faker->randomFloat(2, 10, 5000);

        // Define uma data de início aleatória nos próximos 30 dias
        $startDate = $this->faker->dateTimeBetween('+1 day', '+30 days');

        // Define uma data de término aleatória entre 1 e 12 meses após a data de início
        $endDate = Carbon::parse($startDate)->addMonths($this->faker->numberBetween(1, 12));

        return [
            'student_id' => $student->id,
            'establishment_id' => $establishment->id,
            'service_name' => $serviceName,
            'amount' => $amount,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
        
    }
}

