<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeIPAddressModel 
    extends Model
{
    use HasFactory;
    
    public const DB_TABLE_NAME = 'ip_address_type';
    protected $table = self::DB_TABLE_NAME;

    protected $fillable = 
    [
        
    ];


    protected $hidden = 
    [
        
    ];


    protected $casts = 
    [
        
    ];
}
