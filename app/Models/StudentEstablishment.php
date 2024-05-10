<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEstablishment extends Model
{
    use HasFactory;

    protected $table = 'student_establishment';

    protected $fillable = [
        'student_id',
        'establishment_id',
        'service_name',
        'amount',
        'start_date',
        'end_date',
        'active',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
