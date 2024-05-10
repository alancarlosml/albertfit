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

    /**
     * Get the user that owns the user_establishment relationship.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the establishment that owns the user_establishment relationship.
     */
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
