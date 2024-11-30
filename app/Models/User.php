<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function isAdmin(): bool
    {
        return $this->profile?->is_admin ?? false;
    }

    protected static function booted()
    {
        static::deleted(function ($user) {
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
