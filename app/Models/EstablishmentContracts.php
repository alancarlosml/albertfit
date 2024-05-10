<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstablishmentContracts extends Model
{
    use HasFactory;

    protected $table = 'establishment_contracts';

    protected $fillable = [
        'establishment_id',
        'service_name',
        'amount',
        'start_date',
        'end_date',
        'active',
    ];

    /**
     * Get the establishment that owns the contract.
     */
    public function establishment()
    {
        return $this->belongsTo(Establishment::class);
    }
}
