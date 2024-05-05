<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'exercise_picture',
        'active',
    ];

    // Relacionamento com a tabela Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
