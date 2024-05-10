<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEstablishment extends Model
{
    use HasFactory;

    protected $table = 'user_establishment';

    protected $fillable = [
        'user_id',
        'establishment_id',
        'role',
        'active'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
