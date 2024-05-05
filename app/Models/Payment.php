<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'amount',
        'payment_date',
        // Adicionar mais campos conforme necessário
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
