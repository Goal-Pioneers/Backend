<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

/**
 * 
 */
class AccountModel
    extends Authenticatable
{
    use HasApiTokens, 
        HasFactory, 
        Notifiable;

    public const DB_TABLE_NAME = 'accounts';
    protected $primaryKey = 'id';


    protected $table = self::DB_TABLE_NAME;

    
    protected $fillable = 
    [
        'username',
        'email_id',
        'password',
        'email_verified_at'
    ];


    
    protected $hidden = 
    [
        'password',
        'remember_token',
    ];


    
    protected $casts = 
    [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'email_verified_at' => 'datetime'
    ];
}
