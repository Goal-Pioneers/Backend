<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    
    /**
     * 
     */
    class LabelIPAddressModel 
        extends Model
    {
        use HasFactory;
        
        public const DB_TABLE_NAME = 'label_ip_address';
        
        protected $table = self::DB_TABLE_NAME;
        protected $primaryKey = 'id';
        public $timestamps = false;

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
