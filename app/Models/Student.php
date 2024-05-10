<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'email_verified_at',
        'password',
        'birthdate',
        'address',
        'phone',
        'profile_picture',
        'gender',
        'active',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthdate',
        'email_verified_at',
        'deleted_at',
    ];

    public function user_establishments()
    {
        return $this->belongsToMany(Establishment::class, 'user_establishment');
    }

    public function student_establishments()
    {
        return $this->belongsToMany(Establishment::class, 'student_establishment');
    }
}
