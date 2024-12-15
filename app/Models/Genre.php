<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class);
        return $this->hasMany(Track::class);  
}
}

