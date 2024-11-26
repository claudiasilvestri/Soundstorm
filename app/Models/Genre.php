<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importazione della trait
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
}

