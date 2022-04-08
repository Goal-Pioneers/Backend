<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResets 
    extends Model
{
    use HasFactory;

    protected $table = 'password_resets';
    public $timestamps = false;
    protected $primaryKey = 'id';

    
    protected $fillable = 
    [
        'email_id',
        'token',
        'created_at'
    ];


    
    protected $hidden = 
    [

    ];

    
    
    protected $casts = 
    [
        'created_at' => 'datetime'
    ];

}
