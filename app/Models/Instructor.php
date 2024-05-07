<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'profile_picture',
        'academic_degree',
        'professional_experience',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
