<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'avatar',
        'address',
        'city',
        'province',
        'region',
        'country',
        'zip_code',
        'mobile_number',
        'is_admin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function authIsCreator()
    {
        return $this->user_id === Auth::id();
    }
}


