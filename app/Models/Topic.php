<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
   use HasFactory;

   protected $fillable = [
      'user_id',
      'title',
      'token',
   ];

   public static function generateToken()
   {
      $availableTokens = self::all();

      do {
         $token = Str::random(6);
      } while ($availableTokens->contains('token', $token));

      return $token;
   }
}
