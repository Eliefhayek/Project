<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens as  passportAPI;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasFactory,Notifiable,passportAPI;
    use HasRoles,HasPermissions;
    protected $fillable=[
        'email',
        'password',
        'is_authenticated',
        'first_name',
        'last_name'
    ];
}
