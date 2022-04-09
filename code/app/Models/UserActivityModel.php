<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;



    class UserActivityModel 
        extends Model
    {
        use HasFactory;

        public const DB_TABLE_NAME = 'account_activity_visits';
        
        protected $table = self::DB_TABLE_NAME;
        protected $primaryKey = 'id';


        protected $fillable = 
        [
            'account_id',
            'status_id',
            'address_id',
            'address_type_id',
            'request',
            'authenticated_at'
        ];


        protected $hidden = 
        [
            
        ];


        protected $casts = 
        [
            'authenticated_at' => 'datetime'
        ];
    }
?>
