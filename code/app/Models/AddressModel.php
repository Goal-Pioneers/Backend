<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressModel 
    extends Model
{
    use HasFactory;

    public const DB_TABLE_NAME = 'account_address';
    protected $table = self::DB_TABLE_NAME;
    protected $primaryKey = 'id';

    protected $fillable = 
    [
        'address_field_1_id',
        'address_field_2_id',
        'city_id',
        'post_field_id',
        'country_id'
    ];


    protected $hidden = 
    [
        
    ];


    protected $casts = 
    [
        
    ];
}
