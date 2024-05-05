<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Relacionamento com a tabela ClassSchedule
    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
