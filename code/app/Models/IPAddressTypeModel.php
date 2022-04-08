<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;


    
    class IPAddressTypeModel 
        extends Model
    {
        use HasFactory;
        
        public const DB_TABLE_NAME = 'ip_address_type';

        protected $table = self::DB_TABLE_NAME;
        protected $primaryKey = 'id';

        protected $fillable = 
        [
            'content'
        ];


        protected $hidden = 
        [
            
        ];


        protected $casts = 
        [
            
        ];
        
    }

?>