<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens as  passportAPI;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory,Notifiable,passportAPI;
    protected $fillable=[
        'email',
        'password',
        'is_authenticated'
    ];
}
