<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * 
 */
class SubscriptionModel 
    extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    
    protected $fillable = 
    [
        'category_id',
        'mail_id'
    ];


    protected $hidden = 
    [
        'created_at', 
        'updated_at'
    ];
    

    protected $casts = 
    [
          
    ];

}
