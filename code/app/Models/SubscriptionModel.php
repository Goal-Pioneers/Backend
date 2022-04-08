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
        public const DB_TABLE_NAME = 'subscriptions';

        protected $table = self::DB_TABLE_NAME;
        protected $primaryKey = 'id';

        
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
?>