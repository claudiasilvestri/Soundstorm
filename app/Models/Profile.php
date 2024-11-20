<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Profile extends Model

 {
Use HasFactory;

protected $fillable = [
      'avatar',
      'address',
      'city',
      'province',
      'region',
      'country',
      'zip_code',
      'mobile_number',
];
      public function user()
      {
          return $this->belongsTo(User::class);
      }   
}



