<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',  
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = ['rank'];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function isAdmin()
{
    return $this->role === 'admin';
}

    public function getRankAttribute()
    {
        return $this->rank ?? 0;
    }

    protected static function booted()
    {
        static::deleted(function ($user) {
            self::updateRanks();
        });

        static::created(function ($user) {
            self::updateRanks();
        });

        static::updated(function ($user) {
            self::updateRanks();
        });
    }

    public static function updateRanks()
    {
        $users = User::orderBy('created_at')->get();
        $rank = 1;

        foreach ($users as $user) {
            $user->rank = $rank;
            $user->save();
            $rank++;
        }
    }
}
