<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Establishment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'owner',
        'cnpj',
        'phone',
        'address',
        'social_network',
        'website',
        'active',
    ];

    /**
     * Get the contracts that belongs to the establishment.
     */
    public function contracts()
    {
        return $this->hasMany(EstablishmentContracts::class);
    }
}
