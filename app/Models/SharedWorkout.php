<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedWorkout extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_instructor_id',
        'to_instructor_id',
        'workout_id',
        // Adicionar mais campos conforme necessário
    ];

    // Relacionamento com a tabela Instructor para o instrutor remetente
    public function fromInstructor()
    {
        return $this->belongsTo(Instructor::class, 'from_instructor_id');
    }

    // Relacionamento com a tabela Instructor para o instrutor destinatário
    public function toInstructor()
    {
        return $this->belongsTo(Instructor::class, 'to_instructor_id');
    }

    // Relacionamento com a tabela Workout
    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }
}
