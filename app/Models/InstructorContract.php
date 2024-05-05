<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorContract extends Model
{
    use HasFactory;

    protected $fillable = [
        'instructor_id',
        'service_name',
        'amount',
        'start_date',
        'end_date',
        // Adicione mais campos conforme necessário
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }
}
