<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'service_name',
        'amount',
        'start_date',
        'end_date',
        // Adicione mais campos conforme necessário
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
