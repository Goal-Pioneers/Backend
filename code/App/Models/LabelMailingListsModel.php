<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    
    /**
     * 
     */
    class LabelMailingListsModel 
        extends Model
    {
        use HasFactory;

        public const DB_TABLE_NAME = 'label_mailing_lists';

        protected $table = self::DB_TABLE_NAME;
        public $timestamps = false;
        
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